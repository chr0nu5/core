from django.conf.urls import patterns, url
from fusion import views

urlpatterns = patterns('',
    url(r'^menus/$', views.menus),
    
    #templates
    url(r'^templates/$', views.templates),
    url(r'^template/add/$', views.template_add),
    url(r'^template/save/$', views.template_save),
    
    #builder
    url(r'^builder/(?P<page>\d+)/$', views.builder),
    url(r'^builder/save/$', views.builder_save),
    url(r'^builder/get_widget/$', views.builder_get_widget),
)