from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from django.views.decorators.csrf import csrf_exempt
from fusion.models import Template
from fusion.widgets import ResponsiveGrid
from django.conf import settings
from pydoc import locate

#menus
def menus(request):
    return render(request, 'fusion/menus.html',{})

#templates
def templates(request):
    templates = Template.objects.all().reverse()
    return render(request, 'fusion/templates.html',{'templates':templates})

def template_add(request):
    return render(request, 'fusion/templates_add.html',{})

def template_save(request):
    name = request.POST.get("name")
    template = Template(name=name, json='')
    template.save()
    return HttpResponseRedirect('/fusion/templates/')

#builder

def builder(request, page):
    template = Template.objects.get(pk=page)
    
    apps = []
    
    for app in settings.INSTALLED_APPS:
        if app.startswith('widget_'):
            config = locate(app + '.config.Config')
            config = config()
            config = {
                'slug': app,
                'shortcode': app.replace('widget_','').replace('_','-'),
                'data': config.data()
            }
            apps.append(config)
    
    return render(request, 'fusion/builder.html',{'template':template, 'apps':apps})

@csrf_exempt
def builder_save(request):
    page = request.POST.get("page_id")
    page_content = request.POST.get("page_content")
    page_javascript = request.POST.get("page_runscript")
    
    template = Template.objects.get(pk=page)
    template.json = page_content
    template.javascript = page_javascript
    template.save()
    
    return HttpResponse('Page saved')

@csrf_exempt
def builder_get_widget(request):
    shortcode = 'widget_' + request.POST.get('shortcode').replace('-','_')
    
    #work the magic
    widget = locate(shortcode + '.widget.Widget')
    widget = widget()
    
    return HttpResponse(widget.create())



# import os
# from django.conf import settings
# from django.db.models import loading
# from django.core import management
#
# APPS_DIR = '/path_to/apps/'
#
# for item in os.listdir(APPS_DIR):
#     if os.path.isdir(os.path.join(APPS_DIR, item)):
#         app_name = 'apps.%s' % item
#     if app_name not in settings.INSTALLED_APPS:
#         settings.INSTALLED_APPS += (app_name, )
#
# and then
#
# loading.cache.loaded = False
# management.call_command('syncdb', interactive=False)