# To access environment variables
import os
# To get command line variables such as prompt_text
import sys
# To calculate passed time when generating response
import time

# Check for dependencies. If not installed, install them.
import subprocess
import pkg_resources

required = {'openai', 'argparse'}
installed = {pkg.key for pkg in pkg_resources.working_set}
missing = required - installed

if missing:
	print("Installing dependencies. Please wait...")
	python = sys.executable
	subprocess.check_call([python, '-m', 'pip', 'install', *missing]) #, stdout=subprocess.DEVNULL


# Main reason of this code
import openai as ai
# To make a clear functional script
from argparse import ArgumentParser, ArgumentDefaultsHelpFormatter


# Parse command line arguments
parser = ArgumentParser(formatter_class=ArgumentDefaultsHelpFormatter)
parser.add_argument("-p", 	"--prompt", 	default=sys.argv[1]				help="What the user typed in (type: string)")
parser.add_argument("-m", 	"--model", 		default="text-davinci-003", 	help="Determines the quality, speed, and cost. DaVinci is high quality, Ada is fastest (type: string)")
parser.add_argument("-t", 	"--temperature", 	default=1, type=float, 	help="Level of creativity in the response. Between 0 and 1 (type: float)")
parser.add_argument("-mt", 	"--max_tokens", 	default=300, type=int, 		help="Maximum tokens in the prompt AND response (type: int)")
parser.add_argument("-n", 	"--number", 		default=1, type=int, 		help="The number of completions to generate (type: int)")
parser.add_argument("-s", 	"--stop", 		default=None, 			help="An optional setting to control response generation (type: string)")
parser.add_argument("-k", 	"--key", 		default="", 			help="OPENAI API KEY. If blank it uses environment variable 'OPENAI_API_KEY'  (type: string)")
parser.add_argument("-pr", 	"--print", 		default=False, type=bool,	help="Prints generated result in command screen.  (type: bool)")
args = vars(parser.parse_args())


def error(errorString):
	print(errorString);
	return errorString;


def generate():
	print("Generating...")
	try:
		# Set Api Key of Open AI
		ai.api_key = "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"

		# Start timer
		start_time = time.time()

		# Generate response
		completions = ai.Completion.create(
			engine=args['model'],  			# Determines the quality, speed, and cost.
			temperature=args['temperature'],	# Level of creativity in the response
			prompt=args['prompt'],           	# What the user typed in
			max_tokens=args['max_tokens'],          # Maximum tokens in the prompt AND response
			n=args['number'],                       # The number of completions to generate
			stop=args['stop'],                  	# An optional setting to control response generation
		)

		print("Generated in %s seconds" % (time.time() - start_time))

		if args['key'] == True:
			print(str(completions));

		return completions

	except ai.error.AuthenticationError:
		error("Could not access OPENAI_API_KEY. Either enter one or set environment key.")

	except Exception as e:
		error(e.error)


generate()



