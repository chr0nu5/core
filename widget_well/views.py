from django.shortcuts import render
from django.http import HttpResponse

from django.views.decorators.csrf import csrf_exempt

#py3
#from html.parser import HTMLParser
#py2
from HTMLParser import HTMLParser

@csrf_exempt
def get_widget(request):
    
    animation = request.POST.get('atts[animation]')
    classes = request.POST.get('atts[classes]')
    content = request.POST.get('atts[text]')
    
    unescape = HTMLParser().unescape

    html = '<div class="well ' + classes + '" data-animate="' + animation + '"><div class="webrock-content">' + unescape(content) + '</div></div>'
    return HttpResponse(html)