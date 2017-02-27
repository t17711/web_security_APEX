# Week 5 Resources - Encryption
* Repair Symmetric Encrypt/Decrypt: This page allows agents to perform symmetric encryption and decryption using a key (a.k.a. a password) using the PHP OpenSSL Library.
* Test decryption
    * I heard about your current situation. Do you know who hacked APEX? -- The Chairman
* Repair Generate Public-Private Keys: This page is used to generate a new public-private key pair using the PHP OpenSSL Library.
* Repair Asymmetric Encrypt/Decrypt: This page allows agents to encrypt messages using a public key and to decrypt messages using a private key using the PHP OpenSSL Library.
* Repair Generate Public-Private Keys: This page is used to generate a new public-private key pair using the PHP OpenSSL Library.
* 
    * Cypher text: 
    HF+VXVpoV9Vr9tG9txQ+1iQc71Jh8s+QeSLD9jJt/5BAYF2dfYf8iplFlUPvlEgANk5sE+crsgAgbMcsxT243yuyk2AKiyEwUvuDX2dLtckqcx/2HoriN3zv4DO5kjq3qk6UxAiDiqS9+6ssUoYx43419VgAkiZTvxSRQ+InonY8f5z/rE6+RkN+D6F7v6pKJJE71qKZZ1BkZaLpsujsTjlEo7efUCB7TDaKAcx/TQNNM5Wws5zzUIvyeGaZOf6TrUYpzAvQ3X/p/TcyLATWVInT2ZX0vcTQqrsMJGbBEvZhVU/exSia4jgQY8/K4RzL54QYMS/m9cHgAG0wmdYr6A==
    * Signature
    iOzcjlQNjtLeA8SdvgAQY0SGrg/ipwDJwHb67CecbqwMCrRhdJp37MgiEL9YF5IkWnob8rhklfNFGx2rptefETya96ap/U7JVbjTUhh85gyL08UMlA+L+i3ZTBIZouO08j3XSogAbBSrpG1VpQWH2gmxcBWBrZV9OYURDOFkFSHxyQxitmdYdsO+mTQ8S7wMirgse1j56Ilyx7g/oww0t0rUZcSZX0gtlflnLfCR3amKV8LjR0J/LTNaheaHWTQrRXgaGIKiDUGUff/DcOrWjoRmlgVDBWODwH4U4vWw4Ahm3uHdoiyV1xuE2LhYyYAC4CyQHu3warqEW6Kft1kMNA==
* Agent Messages
    * Repair the dropbox code to process form correctly and add to DB
    * Repair the messages area to show the messages correctly, message is plain text for current user
        * Check validity of messages say valid for valid messages
* Double agent
    * sydneybristow is double agent. Her public key matched signature of message 6.
* SQLI
    * I did mysqli_real_escape_string on find_agent_by_id function in query_functions.php.
* XSS
    * I did htmlspecialchars on all the text display in symmetric_encryption.php.
* Report Encryption
    * I plan to encrypt this readme file after it is complete.

* checksum generator and verifier added to both symmetric and assymetric
    

## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='https://github.com/t17711/web_security_APEX/blob/master/walkthrough.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' /> *

GIF created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

Describe any challenges encountered while building the app.

## License

    Copyright [yyyy] [name of copyright owner]

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.