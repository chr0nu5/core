from django.conf.urls import patterns, url
from widget_team_block import views

urlpatterns = patterns('',
    url(r'^get_widget/', views.get_widget),
)