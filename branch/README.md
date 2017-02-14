# Earthquake Visualization
Description
-------
With all the magnitude 6+ earthquakes that have been happening around the globe during recent months, it is useful to be able to visualize all earthquakes on a map in real time. This web-based earthquake visualization helps to identify all the earthquakes that happened up to seven days in the past on a 3D globe. It also has the functionality of updating new earthquakes in real time if new earthquake information is received. To further enhance the usability, it included a filter system to filter earthquakes based on magnitude and a predefined date range (up to 7 days). The visualization is built on top of WebGL Earth, an alternative to WebGL Globe that also utilizes WebGL technology. The application is based on JavaScript and Bootstrap Framework for the front-end and PHP for the back-end. Running retrieveEarthquakeJson.php will retrieve earthquake JSON data from the USGS database, which will update earthquake info every five minutes. The communication between Javascript and backend PHP will be based on an API file called api.php. Through this PHP file, browser can verify the MD5 value of its current JSON data to see if it is up to date, and retrieve any latest JSON data if necessary. For the front-end, it uses JQuery to make API calls and Google CryptoJS to get the MD5 value of the data.

Animation
-------

Demo:

![Demo](https://github.com/JChenByte/EarthquakeVisualization/raw/master/demo.gif)

Filter:

![Filter](https://github.com/JChenByte/EarthquakeVisualization/raw/master/filter-demo.gif)

Earthquake Details:

![Earthquake Details](https://github.com/JChenByte/EarthquakeVisualization/raw/master/details-demo.gif)

Installation
-------
1. Copy all the files into public_html folder.
2. Use CRON to run retrieveEarthquakeJson.php as a schedule. The intervial should be within every FIVE minutes in order to have the up to date earthquakes data.
3. Done.

Credits
-------
- [WebGL Earth](http://www.webglearth.com/)
- Pin Icon made by [Madebyoliver](http://www.flaticon.com/)
- [CryptoJS](https://code.google.com/archive/p/crypto-js/)
- [Bootstrap](http://getbootstrap.com/)

License
-------
Copyright © 2016 [Jie Chen](https://github.com/JChenByte). Licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
