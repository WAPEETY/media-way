FROM pypy:3
RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y mysql*
RUN pip install --no-cache-dir gunicorn \
 && pip install flask Flask-SQLAlchemy mysqlclient
WORKDIR /usr/src/app
EXPOSE 80

CMD python run.py