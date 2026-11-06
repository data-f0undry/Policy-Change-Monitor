#!/usr/bin/env bash
# Apify CLI - install with: npm install -g apify-cli
set -euo pipefail
apify call data_foundry/policy-change-monitor --input-file input.json --output-dataset
