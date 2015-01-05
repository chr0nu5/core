from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from django.views.decorators.csrf import csrf_exempt
from fusion.models import Template
from fusion.widgets import ResponsiveGrid

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
    return render(request, 'fusion/builder.html',{'template':template})

@csrf_exempt
def builder_get_widget(request):
    shortcode = 'widget_' + request.POST.get('shortcode').replace('-','_')
    
    #work the magic
    from pydoc import locate
    widget = locate(shortcode + '.widget.Widget')
    widget = widget()
    
    return HttpResponse(widget.create())