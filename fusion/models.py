from django.db import models

class Template(models.Model):
    name = models.CharField(max_length=255)
    json = models.TextField(blank=True, null=True)
    javascript = models.TextField(blank=True, null=True)