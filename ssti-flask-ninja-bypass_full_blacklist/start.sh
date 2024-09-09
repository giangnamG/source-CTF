#!/bin/sh
docker build -t web5 .
docker run -p 8887:8887 web5