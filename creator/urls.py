from django.conf.urls import patterns, url
from creator import views

urlpatterns = patterns('',
    url(r'^$',views.index),
    url(r'^templates/$',views.templates),
)