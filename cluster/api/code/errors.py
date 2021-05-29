import json

from app import app, db
from flask import abort, jsonify, request, g
import models



@app.errorhandler(404)
def page_not_found(e):
    # note that we set the 404 status explicitly
    return jsonify({
        'error': 'Not found',
    }), 404



@app.errorhandler(500)
def internal_server_error(e):
    return jsonify({
        'error': 'Internal Server Error'
    }), 500