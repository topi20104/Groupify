import os, os.path
import random
import string

import cherrypy


class StringGenerator(object):
    @cherrypy.expose
    def index(self):
        return """<html>
              <link href="style.css" rel="stylesheet">
</head>

<body>
    
    <div class="container">
        <div class="notification is-primary">
            <h1 class="title">Groups</h1>
    
    <div class="tile is-ancestor">
        <div class="tile is-parent">
            <article class="tile is-child notification is-info">
                <p class="title">Group 1</p>
                <div class="content">
                    <!-- Content -->
                </div>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child notification is-info">
                <p class="title">Group 2</p>
                <div class="content">
                    <!-- Content -->
                </div>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child notification is-info">
                <p class="title">Group 3</p>
                <div class="content">
                    <!-- Content -->
                </div>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child notification is-info">
                <p class="title">Group 4</p>
                <div class="content">
                    <!-- Content -->
                </div>
            </article>
        </div>
    </div>
    

        </div>
    </div>
</body>

        </html>"""

    @cherrypy.expose
    def generate(self, length=8):
        some_string = ''.join(random.sample(string.hexdigits, int(length)))
        cherrypy.session['mystring'] = some_string
        return some_string

    @cherrypy.expose
    def display(self):
        return cherrypy.session['mystring']


if __name__ == '__main__':
    conf = {
        '/': {
            'tools.sessions.on': True,
            'tools.staticdir.root': os.path.abspath(os.getcwd())
        },
        '/static': {
            'tools.staticdir.on': True,
            'tools.staticdir.dir': './public'
        },
        '/style.css' : {
            'tools.staticfile.on': True,
            'tools.staticfile.filename': "C:/Users/User/Downloads/groupify-main1/groupify-main/style.css"
        }
        
    }
    cherrypy.quickstart(StringGenerator(), '/', conf)