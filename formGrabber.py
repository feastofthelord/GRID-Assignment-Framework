import cgi, cgitb

#Instance of field storage object
form = cgi.FieldStorage()


#Get data from forms
firstName = form.getvalue('first')
lastName = form.getvalue('last')
address = form.getvalue('e-mail')
phone = form.getvalue('phone')
summary = form.getvalue('summary')
attachments = form.getvalue('attachments')
