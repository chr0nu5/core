from django.conf.urls import patterns, include, url
from django.contrib import admin

#widgets
from django.conf import settings
from django.utils.importlib import import_module

urlpatterns = patterns('',
    
    #admin
    url(r'^admin/', include(admin.site.urls)),
    #creator urls
    url(r'^creator/', include('creator.urls')),
    #fusion urls
    url(r'^fusion/', include('fusion.urls')),
)

#load widget urls
for app in settings.INSTALLED_APPS:
    if app.startswith('widget_'):
        try:
            _module = import_module('%s.urls' % app)
        except:
            pass
        else:
            urlpatterns += patterns('',
                url(r'^fusion/%s/' % app, include('%s.urls' % app))
            )