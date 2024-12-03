FROM python:3

RUN apt-get update -y && \
    apt-get install -y python3-pip python3-dev && \
    pip install Flask requests

WORKDIR /app

COPY . .

EXPOSE 5000

CMD [ "python", "./app.py" ]
