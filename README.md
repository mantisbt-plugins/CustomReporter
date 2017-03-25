# CustomReporter - a MantisBT plugin

[![Gitter](https://img.shields.io/gitter/room/mantisbt/mantisbt.svg)](https://gitter.im/mantisbt/mantisbt)

Copyright (c) 2010  Carlos Proensa, Cas Nuy  
Copyright (c) 2010-2011, 2015, 2017  Damien Regad - dregad@mantisbt.org

Released under the [GNU General Public License v3](http://opensource.org/licenses/GPL-3.0)


## Description

CustomReporter is a plugin for [MantisBT](http://mantisbt.org) that allows the 
selection of a Reporter from a list on the Report Issue page, if the current
user's access level is equal or above the configured threshold.

This plugin was originally discussed and made available in 
[MantisBT issue 11615](http://www.mantisbt.org/bugs/view.php?id=11615).

See the [Change log](CHANGELOG.md).


## Installation

### Requirements

The plugin requires MantisBT version 2.0.0 or later.

For legacy installations, please download
- 1.3.x: [version 1.5.0](https://github.com/mantisbt-plugins/CustomReporter/releases/tag/v1.5.0).
- 1.2.x: [version 1.04](https://github.com/mantisbt-plugins/CustomReporter/releases/tag/v1.04).


### Setup instructions

1. [Download](https://github.com/mantisbt-plugins/CustomReporter/releases/latest) 
   the plugin, or clone a copy of the 
   [source code](https://github.com/mantisbt-plugins/CustomReporter/).

2. Copy the plugin's code into a `CustomReporter` directory in your Mantis 
   installation's `plugins/` directory. Note that the name is case sensitive.
    
3. Log into Mantis as an administrator, and go to _Manage -> Manage Plugins_.

4. Locate `Custom Reporter Select` in the _Available Plugins_ list, and click
   on the _Install_ link.

5. Click the hyperlink on the plugin's name to configure it.


## Support

The following support channels are available if you wish to file a
[bug report](https://github.com/mantisbt-plugins/CustomReporter/issues/new),
or have questions related to use and installation:

  - [GitHub issues tracker](http://github.com/mantisbt-plugins/CustomReporter/issues)
  - [Gitter chat room](https://gitter.im/mantisbt/mantisbt)

All code contributions (bug fixes, new features and enhancements, translations) 
are welcome and highly encouraged, preferably as a
[Pull Request](https://github.com/mantisbt-plugins/CustomReporter/compare).

The latest source code is available on
[GitHub](https://github.com/mantisbt-plugins/CustomReporter).
