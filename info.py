# encoding: utf-8


# =============================================================================
# package info
# =============================================================================
NAME = 'symmetrics_module_invoice_payment'

TAGS = ('symmetrics', 'magento', 'module', 'php', 'payment', 'invoice', 'mrg')

LICENSE = 'AFL 3.0'

HOMEPAGE = 'http://www.symmetrics.de'

INSTALL_PATH = ''


# =============================================================================
# responsibilities
# =============================================================================
TEAM_LEADER = {
    'Torsten Walluhn': 'tw@symmetrics.de',
}

MAINTAINER = {
    'Yauhen Yakimovich': 'yy@symmetrics.de',
}

AUTHORS = {
    'Siegfried Schmitz': 'ss@symmetrics.de',
    'Eugen Gitin': 'eg@symmetrics.de',
    'Yauhen Yakimovich': 'yy@symmetrics.de',
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
    {'magento': '*', 'magento_enterprise': '*'},
]

EXCLUDES = {}

DEPENDS_ON_FILES = ()

PEAR_KEY = ''

COMPATIBLE_WITH = {
     'magento': ['1.4.0.0'],
     'magento_enterprise': ['1.7.0.0', '1.7.1.0', '1.8.0.0', '1.9.0.0'],
}
