FlexGMaps
=========

FlexGMaps is a wordpress plugin that allows you to embed a google map in a page or post and let the width and height scale with a responsive design.

Usage
=====

Available Params:
* flex: boolean - specify if the map object should scale
* width: int - width of the static map
* height: int - height of the static map
* src: string - source of the google map to embed

Insert the following shortcode into a post or page:
* Flexible Example: `[flexgmaps src="https://maps.google.com/maps?q=New+York,+NY" ]`
* Static Example: `[flexgmaps src="https://maps.google.com/maps?q=New+York,+NY" flex="false" width="640" height="480" ]`