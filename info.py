# encoding: utf-8


# =============================================================================
# package info
# =============================================================================
NAME = 'symmetrics_module_invoice_payment'

TAGS = ('php', 'magento', 'symmetrics', 'module', 'payment'. 'invoice')

LICENSE = 'AFL 3.0'

HOMEPAGE = 'http://www.symmetrics.de'

INSTALL_PATH = ''


# =============================================================================
# responsibilities
# =============================================================================
TEAM_LEADER = {
    'Sergej Braznikov': 'ss@symmetrics.de'
}

MAINTAINER = {
    'Siegfried Schmitz': 'ss@symmetrics.de'
}

AUTHORS = {
    'Siegfried Schmitz': 'ss@symmetrics.de'
}

# =============================================================================
# additional infos
# =============================================================================
INFO = 'Zahlen auf Rechnung'

SUMMARY = '''
Fügt eine neue Zahlungsmethode "Rechnung" hinzu.
'''

NOTES = '''
'''

# =============================================================================
# relations
# =============================================================================
REQUIRES = [
	{'magento': '*', 'magento_enterprise': '*'}
]

EXCLUDES = {}

DEPENDS_ON_FILES = ()

PEAR_KEY = ''

COMPATIBLE_WITH = {
    'magento': ['1.3.2.3', '1.3.2.4'],
	'magento_enterprise': ['1.3.2.3', '1.3.2.4']
}
