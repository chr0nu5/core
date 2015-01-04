from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from fusion.models import Template

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