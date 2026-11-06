"""Python - official apify-client."""
import os
from apify_client import ApifyClient

client = ApifyClient(os.environ["APIFY_TOKEN"])
run = client.actor("data_foundry/policy-change-monitor").call(run_input={
    "urls": [
        "https://policies.google.com/terms",
        "https://stripe.com/legal/terms"
    ]
})
print("dataset:", run["defaultDatasetId"])
for item in client.dataset(run["defaultDatasetId"]).iterate_items():
    print(item)
