from django.conf.urls import patterns, include, url

urlpatterns = patterns('',
    #creator urls
    url(r'^creator/', include('creator.urls')),
)