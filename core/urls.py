from django.conf.urls import patterns, include, url
from django.contrib import admin

urlpatterns = patterns('',
    
    #admin
    url(r'^admin/', include(admin.site.urls)),
    #creator urls
    url(r'^creator/', include('creator.urls')),
    #fusion urls
    url(r'^fusion/', include('fusion.urls')),
)