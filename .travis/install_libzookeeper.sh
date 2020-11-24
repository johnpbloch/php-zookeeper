#! /bin/sh

LIBZOOKEEPER_VERSION=$1
LIBZOOKEEPER_MAJOR_VERSION=`echo ${LIBZOOKEEPER_VERSION} | awk -F'.' '{print $1}'`
LIBZOOKEEPER_MINOR_VERSION=`echo ${LIBZOOKEEPER_VERSION} | awk -F'.' '{print $2}'`
LIBZOOKEEPER_PATCH_VERSION=`echo ${LIBZOOKEEPER_VERSION} | awk -F'.' '{print $3}'`

PACKAGE_NAME=apache-zookeeper-${LIBZOOKEEPER_VERSION}
URL_DIR_NAME=zookeeper-${LIBZOOKEEPER_VERSION}
LIBZOOKEEPER_PREFIX=${HOME}/lib${URL_DIR_NAME}
URL_PREFIX=http://apache.mirrors.lucidnetworks.net/zookeeper

TRAVIS_SCRIPT_DIR=$(cd $(dirname $0); pwd)

wget ${URL_PREFIX}/${URL_DIR_NAME}/${PACKAGE_NAME}.tar.gz || exit 1
tar xvf ${PACKAGE_NAME}.tar.gz || exit 1

wget ${URL_PREFIX}/${URL_DIR_NAME}/${PACKAGE_NAME}-bin.tar.gz || exit 1
tar xvf ${PACKAGE_NAME}-bin.tar.gz || exit 1
cd ${PACKAGE_NAME}-bin
${TRAVIS_SCRIPT_DIR}/init_zk_instances.sh || exit 1
${TRAVIS_SCRIPT_DIR}/launch_zk_instances.sh || exit 1
cd ..
cd ${PACKAGE_NAME}/zookeeper-client/zookeeper-client-c
autoreconf -if
./configure --prefix=${LIBZOOKEEPER_PREFIX} || exit 1
make || exit 1
make install || exit 1
cd ../../..

exit 0
