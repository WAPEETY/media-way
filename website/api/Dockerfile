FROM pypy:3
RUN apt-get update \
    && apt-get upgrade -y
RUN pip install --no-cache-dir gunicorn \
 && pip install flask Flask-SQLAlchemy
WORKDIR /usr/src/app
EXPOSE 80

CMD ./run.py