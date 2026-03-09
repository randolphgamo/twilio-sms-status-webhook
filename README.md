# Twilio SMS Status Webhook (PHP)

A simple PHP webhook to receive SMS delivery status updates from Twilio.

This webhook logs SMS delivery events and can optionally send email notifications when message statuses change.

## Features

- Receives SMS delivery status updates from Twilio
- Logs message status to a file
- Optional email notifications
- Simple and lightweight PHP script

## How it works

When sending an SMS using the Twilio API, you can specify a `statusCallback` URL.

Twilio will send HTTP POST requests to this webhook whenever the message status changes.

Example statuses include:

- queued
- sent
- delivered
- undelivered
- failed
