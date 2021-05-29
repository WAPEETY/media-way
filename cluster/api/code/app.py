#!/usr/bin/env python3
# Import flask and template operators
from flask import Flask, render_template

# Import SQLAlchemy
from flask_sqlalchemy import SQLAlchemy

# Define the WSGI application object
app = Flask(__name__)

# Configurations
app.config.from_object('config')

# Define the database object which is imported
# by modules and controllers
db = SQLAlchemy(app)


# Import the API
import security_jwt

# Import the error pages
import errors

# Import routes
import routes

# Import models
import models


db.create_all()
