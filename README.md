## Running localStack using docker

docker run -d --name localstack -p 4566:4566 -p 4510-4559:4510-4559 localstack/localstack

## setup aws cli to use localStack
sudo apt install awscli -y
aws configure

key id: test
access key: test
use default region: us-east-1
default output format: json

## create an SQS queue
aws --endpoint-url=http://localhost:4566 sqs create-queue --queue-name sqs-default-queue

## verify the bucket was created by listing the available queues
aws --endpoint-url=http://localhost:4566 sqs list-queues

## put the localStack configurations in the .env file
AWS_ACCESS_KEY_ID=test
AWS_SECRET_ACCESS_KEY=test
AWS_DEFAULT_REGION=us-east-1
AWS_ENDPOINT=http://localhost:4566
AWS_USE_PATH_STYLE_ENDPOINT=true
SQS_QUEUE=http://sqs.us-east-1.localhost.localstack.cloud:4566/000000000000/sqs-default-queue
SQS_PREFIX=http://localhost:4566
