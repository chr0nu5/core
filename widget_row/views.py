from django.shortcuts import render
from django.http import HttpResponse

from django.views.decorators.csrf import csrf_exempt

@csrf_exempt
def get_widget(request):
    classes = request.POST.get('atts[classes]')
    margin = request.POST.get('atts[margin]')
    padding = request.POST.get('atts[padding]')
    content = request.POST.get('content')
    html = '<div class="row ' + classes + '" style="margin:' + margin + '; padding:' + padding + '"><div class="webrock-content">' + content + '</div></div>'
    return HttpResponse(html)