from django.shortcuts import render
from django.http import HttpResponse

from django.views.decorators.csrf import csrf_exempt

@csrf_exempt
def get_widget(request):
    
    container = request.POST.get('atts[container]')
    grid = request.POST.get('atts[grid]')
    grid = grid.split('/')
    content = request.POST.get('content')
    
    html = '<div class="grid">'
    
    if container == '1':
        html = html + '<div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content">'
        
    html = html + '<div class="row margin-top-2x margin-bottom-2x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-2x margin-bottom-2x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*" style="position: relative;"><div class="webrock-content">'
    
    for col in grid:
        html = html + '<div class="col col-md-' + col + ' webrock-object" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;&quot;,&quot;md&quot;:&quot;col-md-' + col + '&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column"><div class="webrock-content"></div></div>'
        
    html = html + '</div></div>'
    
    if container == '1':
        html = html + '</div></div>'
        
    html = html + '</div>'
    
    return HttpResponse(html)