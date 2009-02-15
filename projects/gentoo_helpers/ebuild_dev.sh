#!/bin/bash

export BUILD_PREFIX=~/gentoo-dev
mkdir -p "$BUILD_PREFIX"


ebuild="$1"

ebuild "$ebuild" unpack

cd $BUILD_PREFIX


