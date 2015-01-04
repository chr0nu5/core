from django.shortcuts import render

# Create your views here.
def dashboard(request):
    #return render(request, 'metronic/base_admin.html',{})
    return render(request, 'creator/dashboard.html',{})