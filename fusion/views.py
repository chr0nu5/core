from django.shortcuts import render

# Create your views here.
def menus(request):
    return render(request, 'fusion/menus.html',{})

def templates(request):
    return render(request, 'fusion/templates.html',{})