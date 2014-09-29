from django.shortcuts import render
from django.http import HttpResponse

# Create your views here.
def index(request):
    return render(request, 'creator/index.html',{})

def templates(request):
    return render(request, 'creator/templates.html',{})