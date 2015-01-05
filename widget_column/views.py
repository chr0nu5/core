from django.shortcuts import render
from django.http import HttpResponse

from django.views.decorators.csrf import csrf_exempt

@csrf_exempt
def get_widget(request):
    
    animation = request.POST.get('atts[animation]')
    classes = request.POST.get('atts[classes]')
    lg = request.POST.get('atts[lg]')
    md = request.POST.get('atts[md]')
    sm = request.POST.get('atts[sm]')
    xs = request.POST.get('atts[xs]')
    content = request.POST.get('content')

    html = '<div class="col ' + xs + ' ' + sm + ' ' + md + ' ' + lg + ' ' + classes + '" data-animate="' + animation + '"><div class="webrock-content">' + content + '</div></div>'
    return HttpResponse(html)