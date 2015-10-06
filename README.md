# Invoicer

 This is a simple invoice generator for developers / freelancer who are lazy to use some software to manage the invoices.

 The solution works basically by taking in json file with the relavent data and spiting out a html file that can be viewed by the browser and printed to a PDF or Paper. 


## Installation

You have the option to clone this repo and build the phar. Or download the phar [directly](https://github.com/gayanhewa/invoicer/blob/master/bin/invoicer.phar).

	
		wget https://github.com/gayanhewa/invoicer/blob/master/bin/invoicer.phar



If you decide to build it your self , you need to have [Box](https://github.com/box-project/) installed. You can run the below steps :

	
		box build -c manifest.json
	

This command will generate the invoicer.phar to bin directory. You can alternatively move add it to your $PATH.


## Useage 

		Usage:
		  command [options] [arguments]

		Options:
		  -h, --help            Display this help message
		  -q, --quiet           Do not output any message
		  -V, --version         Display this application version
		      --ansi            Force ANSI output
		      --no-ansi         Disable ANSI output
		  -n, --no-interaction  Do not ask any interactive question
		  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

		Available commands:
		  help            Displays help for a command
		  list            Lists commands
		 invoice
		  invoice:create  Create Invoice
		  invoice:sample  Show Sample Json File

	

### invoice:sample 
	
This command will print out how a sample json file looks. You can save it locally and change and use it as an argument for the invoice:create.

	
		./bin/invoicer.phar invoice:sample > sample.json

	

Sample JSON file :

	
		{
		  "owner": {
		    "name" : "Gayan Hewa",
		    "email": "gayanhewa@gmail.com",
		    "address1": "Address Line 1",
		    "address2": "Address Line 2, 000000",
		    "address3": "Country",
		    "logo": "http://nextstepwebs.com/images/logo.png"
		  },
		  "receiver": {
		    "name": "Invoicee Company Pte Ltd",
		    "contact_name": "John Doe",
		    "email": "abc@abc.com",
		    "address1": "Address Line 1",
		    "address2": "Address Line 2, 000000",
		    "address3": "Country"
		  },
		  "items":[
		    {
		      "description": "Invoice for 1st - 15th Oct",
		      "qty": 15,
		      "unit-price": 40.00,
		      "total": 600.00
		    },
		    {
		      "description": "Invoice for 16th- 30th Oct",
		      "qty": 10,
		      "unit-price": 40.00,
		      "total": 400.00
		    }
		  ]
		}

	


### invoice:create

The invoice:crate will take in a input file as the first argument and then return the invoice in html format.

	
		./bin/invoicer.phar invoice:create ./sample.json

		
Or even a URL , you can have your invoice json files in a S3 bucket may be for archival sake.

	
		./bin/invoicer.phar invoice:create https://raw.githubusercontent.com/gayanhewa/invoicer/master/src/templates/invoice-sample.json

The generated invoice will look like below :

![Preview](http://www.gayanhewa.info/invoicer/asset/invoice.png)
		
## TODO 

 - Unit testing 

## Credits 

 - Invoice template - https://github.com/NextStepWebs/simple-html-invoice-template
 - Logo Icon made by Freepik from www.flaticon.com  
 - Symfony Console Package - https://github.com/symfony/console.git
 - Seld Jsonlint - https://github.com/Seldaek/jsonlint.git
 - The PHP League Plates - https://github.com/thephpleague/plates.git
 - Box Project - https://github.com/box-project
