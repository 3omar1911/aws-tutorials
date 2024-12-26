## Running localStack using docker

docker run -d --name localstack -p 4566:4566 -p 4510-4559:4510-4559 localstack/localstack

## setup aws cli to use localStack
sudo apt install awscli -y
aws configure

key id: test
access key: test
use default region: us-east-1
default output format: json

## create an s3 bucket
aws --endpoint-url=http://localhost:4566 s3 mb s3://my-test-bucket

## verify the bucket was created
aws --endpoint-url=http://localhost:4566 s3 ls

## put the localStack configurations in the .env file
AWS_ACCESS_KEY_ID=test
AWS_SECRET_ACCESS_KEY=test
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=my-test-bucket
AWS_ENDPOINT=http://localhost:4566
AWS_USE_PATH_STYLE_ENDPOINT=true