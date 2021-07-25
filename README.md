# rob-watson-cms
CMS for my website at http://rob-watson.uk.
Designed to run on a different server (a Docker container on localhost) to the
main website for security purposes.  It will output template files and populate
databases to service the main website.

## Goals:
1. Specific
> This CMS is designed the fit around my website, it's not a generic content
  management system that anyone can use.
2. Lightweight
> As minimal as possible with simple to follow code.
3. Does the processing a main website would usually do
> The CMS will "compile" articles and other pages into as simple a form as
  possible and saved as template files for the website.
4. Demonstrative
> This code is public and is written in a form to showcase what I know and
  what I can do, and will be full of comments supporting design decisions
  and explaining processes along the way.

## Todo:

1. Scope this out properly
2. Define data format that stores both table definitions AND HTML forms
3. Create interface for managing those data files
4. Create setup file to create database tables based on data files
5. Create page that displays form based on data files
6. Create template compiler
7. Create deployment scripts
