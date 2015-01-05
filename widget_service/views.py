from django.shortcuts import render
from django.http import HttpResponse

from django.views.decorators.csrf import csrf_exempt

#py3
#from html.parser import HTMLParser
#py2
from HTMLParser import HTMLParser

@csrf_exempt
def get_widget(request):
    
    unescape = HTMLParser().unescape
    
    animation = request.POST.get('atts[animation]')
    classes = request.POST.get('atts[classes]')
    content = request.POST.get('atts[text]')
    
    animation = request.POST.get('atts[animation]')
    border = request.POST.get('atts[border]')
    classes = request.POST.get('atts[classes]')
    description = unescape(request.POST.get('atts[description]'))
    font = request.POST.get('atts[font]')
    icon = request.POST.get('atts[icon]')
    iconsize = request.POST.get('atts[iconsize]')
    readmore = request.POST.get('atts[readmore]')
    readmorelink = request.POST.get('atts[readmorelink]')
    style = request.POST.get('atts[style]')
    theme = request.POST.get('atts[theme]')
    title = request.POST.get('atts[title]')
    titlesize = request.POST.get('atts[titlesize]')

    html = '<div class="' + style + ' ' + border + ' ' + classes + ' ' + theme + ' service" data-animate="' + animation + '">'
    if icon:
        html = html + '<i class="fa-' + iconsize + ' service-icon ' + icon + '"></i> '
    html = html + '<' + titlesize + ' class="service-title ' + font + '">' + title + '</' + titlesize + '>'
    html = html + '<div class="service-description">' + description + '</div>'
    if readmore:
        html = html + '<a class="service-link" href="' + readmorelink + '">' + readmore + ' <i class="fa fa-caret-right"></i></a>'
    html = html + '</div>'
    return HttpResponse(html)