FROM python:3.10-slim-bullseye


LABEL auther_template="khanhhnahk1"


RUN sed -i 's/deb.debian.org/mirrors.ustc.edu.cn/g' /etc/apt/sources.list && \
    sed -i 's/security.debian.org/mirrors.ustc.edu.cn/g' /etc/apt/sources.list
RUN apt-get update 

# install flask
RUN python3 -m pip install -i https://pypi.tuna.tsinghua.edu.cn/simple \
    flask

# Copy the source code and startup script to the root directory
COPY ./src/ /app
COPY ./service/docker-entrypoint.sh /

# expose port
EXPOSE 8887
RUN groupadd -r web5 && useradd -r -g web5 web5 
RUN echo "PTITCTF{123123123132123123}"> /app/flag.txt
RUN chmod 440 /app/flag.txt
RUN chown -R root:web5 /app


USER web5

WORKDIR /app


ENTRYPOINT ["/bin/bash","/docker-entrypoint.sh"]