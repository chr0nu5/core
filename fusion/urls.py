from django.conf.urls import patterns, url
from fusion import views

urlpatterns = patterns('',
    url(r'^menus/', views.menus),
    url(r'^templates/', views.templates),
)