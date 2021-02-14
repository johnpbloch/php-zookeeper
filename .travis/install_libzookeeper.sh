#! /bin/sh

LIBZOOKEEPER_VERSION=$1
MAJOR=`echo ${LIBZOOKEEPER_VERSION} | awk -F'.' '{print $1}'`
MINOR=`echo ${LIBZOOKEEPER_VERSION} | awk -F'.' '{print $2}'`
PATCH=`echo ${LIBZOOKEEPER_VERSION} | awk -F'.' '{print $3}'`
LIBZOOKEEPER_COMP_VERSION=$(printf "%d%02d%02d" ${MAJOR} ${MINOR} ${PATCH})

if [ ${LIBZOOKEEPER_COMP_VERSION} -ge 30500 ]; then
    PACKAGE_NAME=apache-zookeeper-${LIBZOOKEEPER_VERSION}
    URL_PREFIX=http://apache.mirrors.lucidnetworks.net/zookeeper
else
    PACKAGE_NAME=zookeeper-${LIBZOOKEEPER_VERSION}
    URL_PREFIX=http://archive.apache.org/dist/zookeeper
fi
URL_DIR_NAME=zookeeper-${LIBZOOKEEPER_VERSION}
LIBZOOKEEPER_PREFIX=${HOME}/lib${URL_DIR_NAME}

TRAVIS_SCRIPT_DIR=$(cd $(dirname $0); pwd)

wget -q ${URL_PREFIX}/${URL_DIR_NAME}/${PACKAGE_NAME}.tar.gz || exit 1
tar xzf ${PACKAGE_NAME}.tar.gz || exit 1

if [ ${LIBZOOKEEPER_COMP_VERSION} -ge 30500 ]; then
    wget -q ${URL_PREFIX}/${URL_DIR_NAME}/${PACKAGE_NAME}-bin.tar.gz || exit 1
    tar xzf ${PACKAGE_NAME}-bin.tar.gz || exit 1
    cd ${PACKAGE_NAME}-bin
    ${TRAVIS_SCRIPT_DIR}/init_zk_instances.sh || exit 1
    ${TRAVIS_SCRIPT_DIR}/launch_zk_instances.sh || exit 1
    cd ..
else
    mv ${PACKAGE_NAME}/conf/zoo_sample.cfg ${PACKAGE_NAME}/conf/zoo.cfg
    ${PACKAGE_NAME}/bin/zkServer.sh start
fi

if [ ${LIBZOOKEEPER_COMP_VERSION} -ge 30500 ]; then
    cd ${PACKAGE_NAME}
    mvn -q -DskipTests -pl zookeeper-jute compile
    cd zookeeper-client/zookeeper-client-c
    autoreconf -if
else
    cd ${PACKAGE_NAME}/zookeeper-client/zookeeper-client-c
fi

./configure --prefix=${LIBZOOKEEPER_PREFIX} || exit 1
make || exit 1
make install || exit 1
cd ../../..

exit 0
