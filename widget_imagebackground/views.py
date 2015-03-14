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
    
    backgroundimage = request.POST.get('atts[backgroundimage]')
    backgroundsolid = request.POST.get('atts[backgroundsolid]')
    backgroundtype = request.POST.get('atts[backgroundtype]')
    classes = request.POST.get('atts[classes]','')
    w_id = request.POST.get('atts[id]')
    margin = request.POST.get('atts[margin]','')
    padding = request.POST.get('atts[padding]','')
    content = request.POST.get('content','')
    
    html = '<div class="imagebackground ' + classes + '" id="' + w_id + '" style="margin: ' + margin + '; padding: ' + padding + '" >' + content + '</div>'
    
    if w_id:
        html = html + '<style> #' + w_id + ' {'
        if backgroundimage:
            html = html + 'background-image: url(' + backgroundimage + ');'
            if backgroundtype == 'cover':
                html = html + '-webkit-background-size: cover;'
                html = html + '-moz-background-size: cover;'
                html = html + '-o-background-size: cover;'
                html = html + 'background-size: cover;'
                html = html + "filter: progid:DXImageTransform+Microsoft+AlphaImageLoader(src='" + backgroundimage + "', sizingMethod='scale');"
                html = html + "-ms-filter: \"progid:DXImageTransform+Microsoft+AlphaImageLoader(src='" + backgroundimage + "', sizingMethod='scale')\";"
            if backgroundtype == 'parallax':
                html = html + 'background-attachment: fixed;'
                html = html + '-webkit-background-size: cover;'
                html = html + '-moz-background-size: cover;'
                html = html + '-o-background-size: cover;'
                html = html + 'background-size: cover;'
                html = html + "filter: progid:DXImageTransform+Microsoft+AlphaImageLoader(src='" + backgroundimage + "', sizingMethod='scale');"
                html = html + "-ms-filter: \"progid:DXImageTransform+Microsoft+AlphaImageLoader(src='" + backgroundimage + "', sizingMethod='scale')\";"
        if backgroundsolid:
            html = html + 'background-color: ' + backgroundsolid + ';'
        html = html + '} </style>'
    
    return HttpResponse(html)