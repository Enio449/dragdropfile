<?php

/*
 +-----------------------------------------------------------------------+
 | Main configuration file with default settings                         |
 |                                                                       |
 | This file is part of the Roundcube Webmail client                     |
 | Copyright (C) 2005-2013, The Roundcube Dev Team                       |
 |                                                                       |
 | Licensed under the GNU General Public License version 3 or            |
 | any later version with exceptions for skins & plugins.                |
 | See the README file for a full license statement.                     |
 +-----------------------------------------------------------------------+
*/

$config = array();

// ----------------------------------
// SQL DATABASE
// ----------------------------------


// PEAR database DSN for read/write operations
// format is db_provider://user:password@host/database 
// For examples see http://pear.php.net/manual/en/package.database.mdb2.intro-dsn.php
// currently supported db_providers: mysql, mysqli, pgsql, sqlite, mssql or sqlsrv

$config['db_dsnw'] = 'mysql://roundcubemail:IvN5kin3dxX5_ACj@localhost/roundcubemail';

// postgres example: 'pgsql://roundcube:pass@localhost/roundcubemail';
// Warning: for SQLite use absolute path in DSN:
// sqlite example: 'sqlite:////full/path/to/sqlite.db?mode=0646';

// PEAR database DSN for read only operations (if empty write database will be used)
// useful for database replication
$config['db_dsnr'] = '';

// use persistent db-connections
// beware this will not "always" work as expected
// see: http://www.php.net/manual/en/features.persistent-connections.php
$config['db_persistent'] = FALSE;

// you can define specific table names used to store webmail data
$config['db_table_users'] = 'users';
$config['db_table_identities'] = 'identities';
$config['db_table_contacts'] = 'contacts';
$config['db_table_contactgroups'] = 'contactgroups';
$config['db_table_contactgroupmembers'] = 'contactgroupmembers';
$config['db_table_session'] = 'session';
$config['db_table_cache'] = 'cache';
$config['db_table_cache_index'] = 'cache_index';
$config['db_table_cache_thread'] = 'cache_thread';
$config['db_table_cache_messages'] = 'cache_messages';
$config['db_table_dictionary'] = 'dictionary';
$config['db_table_searches'] = 'searches';
$config['db_table_system'] = 'system';

// you can define specific sequence names used in PostgreSQL
$config['db_sequence_users'] = 'user_ids';
$config['db_sequence_identities'] = 'identity_ids';
$config['db_sequence_contacts'] = 'contact_ids';
$config['db_sequence_contactgroups'] = 'contactgroups_ids';
$config['db_sequence_searches'] = 'search_ids';


// end db config file


// ----------------------------------
// LOGGING/DEBUGGING
// ----------------------------------

// system error reporting, sum of: 1 = log; 4 = show, 8 = trace
$config['debug_level'] = 1;

// log driver:  'syslog' or 'file'.
$config['log_driver'] = 'file';

// date format for log entries
// (read http://php.net/manual/en/function.date.php for all format characters)  
$config['log_date_format'] = 'd-M-Y H:i:s O';

// Syslog ident string to use, if using the 'syslog' log driver.
$config['syslog_id'] = 'roundcube';

// Syslog facility to use, if using the 'syslog' log driver.
// For possible values see installer or http://php.net/manual/en/function.openlog.php
$config['syslog_facility'] = LOG_USER;

// Log sent messages to <log_dir>/sendmail or to syslog
$config['smtp_log'] = true;

// Log successful logins to <log_dir>/userlogins or to syslog
$config['log_logins'] = false;

// Log session authentication errors to <log_dir>/session or to syslog
$config['log_session'] = false;

// Log SQL queries to <log_dir>/sql or to syslog
$config['sql_debug'] = false;

// Log IMAP conversation to <log_dir>/imap or to syslog
$config['imap_debug'] = false;

// Log LDAP conversation to <log_dir>/ldap or to syslog
$config['ldap_debug'] = false;

// Log SMTP conversation to <log_dir>/smtp or to syslog
$config['smtp_debug'] = false;

// ----------------------------------
// IMAP
// ----------------------------------

// The mail host chosen to perform the log-in.
// Leave blank to show a textbox at login, give a list of hosts
// to display a pulldown menu or set one host as string.
// To use SSL/TLS connection, enter hostname with prefix ssl:// or tls://
// Supported replacement variables:
// %n - hostname ($_SERVER['SERVER_NAME'])
// %t - hostname without the first part
// %d - domain (http hostname $_SERVER['HTTP_HOST'] without the first part)
// %s - domain name after the '@' from e-mail address provided at login screen
// For example %n = mail.domain.tld, %t = domain.tld
// WARNING: After hostname change update of mail_host column in users table is
//          required to match old user data records with the new host.
$config['default_host'] = array(
    'localhost' => 'hldns.ru',
    '127.0.0.1' => 'Local'
);

// TCP port used for IMAP connections
$config['default_port'] = 143;

// IMAP AUTH type (DIGEST-MD5, CRAM-MD5, LOGIN, PLAIN or null to use
// best server supported one)
$config['imap_auth_type'] = null;

// If you know your imap's folder delimiter, you can specify it here.
// Otherwise it will be determined automatically
$config['imap_delimiter'] = null;

// If IMAP server doesn't support NAMESPACE extension, but you're
// using shared folders or personal root folder is non-empty, you'll need to
// set these options. All can be strings or arrays of strings.
// Folders need to be ended with directory separator, e.g. "INBOX."
// (special directory "~" is an exception to this rule)
// These can be used also to overwrite server's namespaces
$config['imap_ns_personal'] = null;
$config['imap_ns_other']    = null;
$config['imap_ns_shared']   = null;

// By default IMAP capabilities are readed after connection to IMAP server
// In some cases, e.g. when using IMAP proxy, there's a need to refresh the list
// after login. Set to True if you've got this case.
$config['imap_force_caps'] = false;

// By default list of subscribed folders is determined using LIST-EXTENDED
// extension if available. Some servers (dovecot 1.x) returns wrong results
// for shared namespaces in this case. http://trac.roundcube.net/ticket/1486225
// Enable this option to force LSUB command usage instead.
$config['imap_force_lsub'] = false;

// Some server configurations (e.g. Courier) doesn't list folders in all namespaces
// Enable this option to force listing of folders in all namespaces
$config['imap_force_ns'] = false;

// IMAP connection timeout, in seconds. Default: 0 (no limit)
$config['imap_timeout'] = 0;

// Optional IMAP authentication identifier to be used as authorization proxy
$config['imap_auth_cid'] = null;

// Optional IMAP authentication password to be used for imap_auth_cid
$config['imap_auth_pw'] = null;

// Type of IMAP indexes cache. Supported values: 'db', 'apc' and 'memcache'.
$config['imap_cache'] = null;

// Enables messages cache. Only 'db' cache is supported.
$config['messages_cache'] = false;


// ----------------------------------
// SMTP
// ----------------------------------

// SMTP server host (for sending mails).
// To use SSL/TLS connection, enter hostname with prefix ssl:// or tls://
// If left blank, the PHP mail() function is used
// Supported replacement variables:
// %h - user's IMAP hostname
// %n - hostname ($_SERVER['SERVER_NAME'])
// %t - hostname without the first part
// %d - domain (http hostname $_SERVER['HTTP_HOST'] without the first part)
// %z - IMAP domain (IMAP hostname without the first part)
// For example %n = mail.domain.tld, %t = domain.tld
$config['smtp_server'] = '127.0.0.1';

// SMTP port (default is 25; use 587 for STARTTLS or 465 for the
// deprecated SSL over SMTP (aka SMTPS))
$config['smtp_port'] = 10587;

// SMTP username (if required) if you use %u as the username Roundcube
// will use the current username for login
$config['smtp_user'] = '%u';

// SMTP password (if required) if you use %p as the password Roundcube
// will use the current user's password for login
$config['smtp_pass'] = '%p';

// SMTP AUTH type (DIGEST-MD5, CRAM-MD5, LOGIN, PLAIN or empty to use
// best server supported one)
$config['smtp_auth_type'] = '';

// Optional SMTP authentication identifier to be used as authorization proxy
$config['smtp_auth_cid'] = null;

// Optional SMTP authentication password to be used for smtp_auth_cid
$config['smtp_auth_pw'] = null;

// SMTP HELO host 
// Hostname to give to the remote server for SMTP 'HELO' or 'EHLO' messages 
// Leave this blank and you will get the server variable 'server_name' or 
// localhost if that isn't defined. 
$config['smtp_helo_host'] = '';

// SMTP connection timeout, in seconds. Default: 0 (no limit)
// Note: There's a known issue where using ssl connection with
// timeout > 0 causes connection errors (https://bugs.php.net/bug.php?id=54511)
$config['smtp_timeout'] = 0;

// ----------------------------------
// SYSTEM
// ----------------------------------

// THIS OPTION WILL ALLOW THE INSTALLER TO RUN AND CAN EXPOSE SENSITIVE CONFIG DATA.
// ONLY ENABLE IT IF YOU'RE REALLY SURE WHAT YOU'RE DOING!
$config['enable_installer'] = false;

// don't allow these settings to be overriden by the user
$config['dont_override'] = array();

// provide an URL where a user can get support for this Roundcube installation
// PLEASE DO NOT LINK TO THE ROUNDCUBE.NET WEBSITE HERE!
$config['support_url'] = '';

// replace Roundcube logo with this image
// specify an URL relative to the document root of this Roundcube installation
//$config['skin_logo'] = null;
$config['skin_logo'] = array(
	'[favicon]' => 'skins/larry/custom/images/favicon.ico',
	'*'	=> 'skins/larry/custom/images/logo.png'
);

// automatically create a new Roundcube user when log-in the first time.
// a new user will be created once the IMAP login succeeds.
// set to false if only registered users can use this service
$config['auto_create_user'] = true;

// Enables possibility to log in using email address from user identities
$config['user_aliases'] = false;

// use this folder to store log files (must be writeable for apache user)
// This is used by the 'file' log driver.
$config['log_dir'] = '/var/log/roundcubemail/';

// use this folder to store temp files (must be writeable for apache user)
$config['temp_dir'] = '/var/tmp/';

// lifetime of message cache
// possible units: s, m, h, d, w
$config['message_cache_lifetime'] = '10d';

// enforce connections over https
// with this option enabled, all non-secure connections will be redirected.
// set the port for the ssl connection as value of this option if it differs from the default 443
$config['force_https'] = false;

// tell PHP that it should work as under secure connection
// even if it doesn't recognize it as secure ($_SERVER['HTTPS'] is not set)
// e.g. when you're running Roundcube behind a https proxy
// this option is mutually exclusive to 'force_https' and only either one of them should be set to true.
$config['use_https'] = true;

// Allow browser-autocompletion on login form.
// 0 - disabled, 1 - username and host only, 2 - username, host, password
$config['login_autocomplete'] = 2;

// Forces conversion of logins to lower case.
// 0 - disabled, 1 - only domain part, 2 - domain and local part.
// If users authentication is case-insensitive this must be enabled.
// Note: After enabling it all user records need to be updated, e.g. with query:
//       UPDATE users SET username = LOWER(username);
$config['login_lc'] = 2;

// Includes should be interpreted as PHP files
$config['skin_include_php'] = false;

// display software version on login screen
$config['display_version'] = false;

// Session lifetime in minutes
$config['session_lifetime'] = 10;

// Session domain: .example.org
$config['session_domain'] = '';

// Session name. Default: 'roundcube_sessid'
$config['session_name'] = null;

// Session authentication cookie name. Default: 'roundcube_sessauth'
$config['session_auth_name'] = null;

// Session path. Defaults to PHP session.cookie_path setting.
$config['session_path'] = null;

// Backend to use for session storage. Can either be 'db' (default) or 'memcache'
// If set to memcache, a list of servers need to be specified in 'memcache_hosts'
// Make sure the Memcache extension (http://pecl.php.net/package/memcache) version >= 2.0.0 is installed
$config['session_storage'] = 'db';

// Use these hosts for accessing memcached
// Define any number of hosts in the form of hostname:port or unix:///path/to/socket.file
$config['memcache_hosts'] = null; // e.g. array( 'localhost:11211', '192.168.1.12:11211', 'unix:///var/tmp/memcached.sock' );

// check client IP in session athorization
$config['ip_check'] = false;

// check referer of incoming requests
$config['referer_check'] = false;

// X-Frame-Options HTTP header value sent to prevent from Clickjacking.
// Possible values: sameorigin|deny. Set to false in order to disable sending them
$config['x_frame_options'] = 'sameorigin';

// this key is used to encrypt the users imap password which is stored
// in the session record (and the client cookie if remember password is enabled).
// please provide a string of exactly 24 chars.
$config['des_key'] = 'HoxQsvEI3krHf3P98yDWDz0Y';

// Automatically add this domain to user names for login
// Only for IMAP servers that require full e-mail addresses for login
// Specify an array with 'host' => 'domain' values to support multiple hosts
// Supported replacement variables:
// %h - user's IMAP hostname
// %n - hostname ($_SERVER['SERVER_NAME'])
// %t - hostname without the first part
// %d - domain (http hostname $_SERVER['HTTP_HOST'] without the first part)
// %z - IMAP domain (IMAP hostname without the first part)
// For example %n = mail.domain.tld, %t = domain.tld
$config['username_domain'] = array(
     'localhost' => 'hldns.ru',
);

// This domain will be used to form e-mail addresses of new users
// Specify an array with 'host' => 'domain' values to support multiple hosts
// Supported replacement variables:
// %h - user's IMAP hostname
// %n - http hostname ($_SERVER['SERVER_NAME'])
// %d - domain (http hostname without the first part)
// %z - IMAP domain (IMAP hostname without the first part)
// For example %n = mail.domain.tld, %t = domain.tld
$config['mail_domain'] = 'hldns.ru';

// Password charset.
// Use it if your authentication backend doesn't support UTF-8.
// Defaults to ISO-8859-1 for backward compatibility
$config['password_charset'] = 'ISO-8859-1';

// How many seconds must pass between emails sent by a user
$config['sendmail_delay'] = 0;

// Maximum number of recipients per message. Default: 0 (no limit)
$config['max_recipients'] = 0; 

// Maximum allowednumber of members of an address group. Default: 0 (no limit)
// If 'max_recipients' is set this value should be less or equal
$config['max_group_members'] = 0; 

// add this user-agent to message headers when sending
$config['useragent'] = 'Roundcube Webmail/'.RCMAIL_VERSION;

// use this name to compose page titles
$config['product_name'] = 'Roundcube Webmail';

// try to load host-specific configuration
// see http://trac.roundcube.net/wiki/Howto_Config for more details
$config['include_host_config'] = false;

// path to a text file which will be added to each sent message
// paths are relative to the Roundcube root folder
$config['generic_message_footer'] = '';

// path to a text file which will be added to each sent HTML message
// paths are relative to the Roundcube root folder
$config['generic_message_footer_html'] = '';

// add a received header to outgoing mails containing the creators IP and hostname
$config['http_received_header'] = false;

// Whether or not to encrypt the IP address and the host name
// these could, in some circles, be considered as sensitive information;
// however, for the administrator, these could be invaluable help
// when tracking down issues.
$config['http_received_header_encrypt'] = false;

// This string is used as a delimiter for message headers when sending
// a message via mail() function. Leave empty for auto-detection
$config['mail_header_delimiter'] = NULL;

// number of chars allowed for line when wrapping text.
// text wrapping is done when composing/sending messages
$config['line_length'] = 72;

// send plaintext messages as format=flowed
$config['send_format_flowed'] = true;

// According to RFC2298, return receipt envelope sender address must be empty.
// If this option is true, Roundcube will use user's identity as envelope sender for MDN responses.
$config['mdn_use_from'] = false;

// Set identities access level:
// 0 - many identities with possibility to edit all params
// 1 - many identities with possibility to edit all params but not email address
// 2 - one identity with possibility to edit all params
// 3 - one identity with possibility to edit all params but not email address
// 4 - one identity with possibility to edit only signature
$config['identities_level'] = 0;

// Mimetypes supported by the browser.
// attachments of these types will open in a preview window
// either a comma-separated list or an array: 'text/plain,text/html,text/xml,image/jpeg,image/gif,image/png,application/pdf'
$config['client_mimetypes'] = null;  # null == default

// Path to a local mime magic database file for PHPs finfo extension.
// Set to null if the default path should be used.
$config['mime_magic'] = null;

// Absolute path to a local mime.types mapping table file.
// This is used to derive mime-types from the filename extension or vice versa.
// Such a file is usually part of the apache webserver. If you don't find a file named mime.types on your system,
// download it from http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
$config['mime_types'] = null;

// path to imagemagick identify binary
$config['im_identify_path'] = null;

// path to imagemagick convert binary
$config['im_convert_path'] = null;

// Size of thumbnails from image attachments displayed below the message content.
// Note: whether images are displayed at all depends on the 'inline_images' option.
// Set to 0 to display images in full size.
$config['image_thumbnail_size'] = 240;

// maximum size of uploaded contact photos in pixel
$config['contact_photo_size'] = 160;

// Enable DNS checking for e-mail address validation
$config['email_dns_check'] = false;

// Disables saving sent messages in Sent folder (like gmail) (Default: false)
// Note: useful when SMTP server stores sent mail in user mailbox
$config['no_save_sent_messages'] = false;

// ----------------------------------
// ADDRESSBOOK SETTINGS
// ----------------------------------

// This indicates which type of address book to use. Possible choises:
// 'sql' (default), 'ldap' and ''.
// If set to 'ldap' then it will look at using the first writable LDAP
// address book as the primary address book and it will not display the
// SQL address book in the 'Address Book' view.
// If set to '' then no address book will be displayed or only the
// addressbook which is created by a plugin (like CardDAV).
//$config['address_book_type'] = 'sql';

// In order to enable public ldap search, configure an array like the Verisign
// example further below. if you would like to test, simply uncomment the example.
// Array key must contain only safe characters, ie. a-zA-Z0-9_

// If you are going to use LDAP for individual address books, you will need to 
// set 'user_specific' to true and use the variables to generate the appropriate DNs to access it.
//
// The recommended directory structure for LDAP is to store all the address book entries
// under the users main entry, e.g.:
//
//  o=root
//   ou=people
//    uid=user@domain
//  mail=contact@contactdomain
//
// So the base_dn would be uid=%fu,ou=people,o=root
// The bind_dn would be the same as based_dn or some super user login.
$config['ldap_public']['public'] = array(
    'name'                   => 'Public LDAP Addressbook',
    'hosts'                  => array('ldap://127.0.0.1'),
    'port'                   => 389,
    'use_tls'                => false,
    'user_specific'          => false,
    'base_dn'                => 'ou=People,dc=directory,dc=nh',
    'bind_dn'                => 'cn=ldapservice,dc=directory,dc=nh',
    'bind_pass'              => 'iQcdFMZ4v6R_mMRY',
    'scope'                  => 'sub',
    'referrals'              => 0,
    'filter'                 => '(objectClass=inetOrgPerson)',
    'search_fields'          => array('mail','cn'),
    'fuzzy_search'           => true,
    'groups'                 => array(
        'base_dn'            => '',
        'filter'             => '(objectClass=posixGroup)',
        'object_classes'     => array("top", "posixGroup"),
        'member_attr'        => 'uid',
  ),
  'fieldmap' => array(
    'name'         => 'cn',
    'surname'      => 'sn',
    'firstname'    => 'givenName',
    'jobtitle'     => 'title',
    'email'        => 'mail:*',
    'locality'     => 'l',
    'organization' => 'o',
    'department'   => 'ou',
    'phone'        => 'telephoneNumber',
    'street'       => 'street',
  ),
); // end of 'public' addressbook definition

// An ordered array of the ids of the addressbooks that should be searched
// when populating address autocomplete fields server-side. ex: array('sql','Verisign');
$config['autocomplete_addressbooks'] = array('sql','public');

// The minimum number of characters required to be typed in an autocomplete field
// before address books will be searched. Most useful for LDAP directories that
// may need to do lengthy results building given overly-broad searches
$config['autocomplete_min_length'] = 1;

// Number of parallel autocomplete requests.
// If there's more than one address book, n parallel (async) requests will be created,
// where each request will search in one address book. By default (0), all address
// books are searched in one request.
$config['autocomplete_threads'] = 0;

// Max. numer of entries in autocomplete popup. Default: 15.
$config['autocomplete_max'] = 15;

// show address fields in this order
// available placeholders: {street}, {locality}, {zipcode}, {country}, {region}
$config['address_template'] = '{street}<br/>{locality} {zipcode}<br/>{country} {region}';

// Matching mode for addressbook search (including autocompletion)
// 0 - partial (*abc*), default
// 1 - strict (abc)
// 2 - prefix (abc*)
// Note: For LDAP sources fuzzy_search must be enabled to use 'partial' or 'prefix' mode
$config['addressbook_search_mode'] = 0;


// ----------------------------------
// USER INTERFACE
// ----------------------------------

// default messages sort column. Use empty value for default server's sorting, 
// or 'arrival', 'date', 'subject', 'from', 'to', 'fromto', 'size', 'cc'
$config['message_sort_col'] = '';

// default messages sort order
$config['message_sort_order'] = 'DESC';

// These cols are shown in the message list. Available cols are:
// subject, from, to, fromto, cc, replyto, date, size, status, flag, attachment, 'priority'
$config['list_cols'] = array('subject', 'status', 'fromto', 'date', 'size', 'flag', 'attachment');

// the default locale setting (leave empty for auto-detection)
// RFC1766 formatted language name like en_US, de_DE, de_CH, fr_FR, pt_BR
$config['language'] = null;

// use this format for date display (date or strftime format)
$config['date_format'] = 'Y-m-d';

// give this choice of date formats to the user to select from
// Note: do not use ambiguous formats like m/d/Y
$config['date_formats'] = array('Y-m-d', 'Y/m/d', 'Y.m.d', 'd-m-Y', 'd/m/Y', 'd.m.Y', 'j.n.Y');

// use this format for time display (date or strftime format)
$config['time_format'] = 'H:i';

// give this choice of time formats to the user to select from
$config['time_formats'] = array('G:i', 'H:i', 'g:i a', 'h:i A');

// use this format for short date display (derived from date_format and time_format)
$config['date_short'] = 'D H:i';

// use this format for detailed date/time formatting (derived from date_format and time_format)
$config['date_long'] = 'Y-m-d H:i';

// store draft message is this mailbox
// leave blank if draft messages should not be stored
// NOTE: Use folder names with namespace prefix (INBOX. on Courier-IMAP)
$config['drafts_mbox'] = 'Drafts';

// store spam messages in this mailbox
// NOTE: Use folder names with namespace prefix (INBOX. on Courier-IMAP)
$config['junk_mbox'] = 'Junk';

// store sent message is this mailbox
// leave blank if sent messages should not be stored
// NOTE: Use folder names with namespace prefix (INBOX. on Courier-IMAP)
$config['sent_mbox'] = 'Sent';

// move messages to this folder when deleting them
// leave blank if they should be deleted directly
// NOTE: Use folder names with namespace prefix (INBOX. on Courier-IMAP)
$config['trash_mbox'] = 'Trash';

// display these folders separately in the mailbox list.
// these folders will also be displayed with localized names
// NOTE: Use folder names with namespace prefix (INBOX. on Courier-IMAP)
$config['default_folders'] = array('INBOX', 'Drafts', 'Sent', 'Junk', 'Trash');

// automatically create the above listed default folders on first login
$config['create_default_folders'] = true;

// protect the default folders from renames, deletes, and subscription changes
$config['protect_default_folders'] = true;

// if in your system 0 quota means no limit set this option to true 
$config['quota_zero_as_unlimited'] = false;

// Make use of the built-in spell checker. It is based on GoogieSpell.
// Since Google only accepts connections over https your PHP installatation
// requires to be compiled with Open SSL support
$config['enable_spellcheck'] = true;

// Enables spellchecker exceptions dictionary.
// Setting it to 'shared' will make the dictionary shared by all users.
$config['spellcheck_dictionary'] = false;

// Set the spell checking engine. 'googie' is the default. 'pspell' is also available,
// but requires the Pspell extensions. When using Nox Spell Server, also set 'googie' here.
$config['spellcheck_engine'] = 'googie';

// For a locally installed Nox Spell Server, please specify the URI to call it.
// Get Nox Spell Server from http://orangoo.com/labs/?page_id=72
// Leave empty to use the Google spell checking service, what means
// that the message content will be sent to Google in order to check spelling
$config['spellcheck_uri'] = '';

// These languages can be selected for spell checking.
// Configure as a PHP style hash array: array('en'=>'English', 'de'=>'Deutsch');
// Leave empty for default set of available language.
$config['spellcheck_languages'] = NULL;

// Makes that words with all letters capitalized will be ignored (e.g. GOOGLE)
$config['spellcheck_ignore_caps'] = false;

// Makes that words with numbers will be ignored (e.g. g00gle)
$config['spellcheck_ignore_nums'] = false;

// Makes that words with symbols will be ignored (e.g. g@@gle)
$config['spellcheck_ignore_syms'] = false;

// Use this char/string to separate recipients when composing a new message
$config['recipients_separator'] = ',';

// don't let users set pagesize to more than this value if set
$config['max_pagesize'] = 200;

// Minimal value of user's 'refresh_interval' setting (in seconds)
$config['min_refresh_interval'] = 60;

// Enables files upload indicator. Requires APC installed and enabled apc.rfc1867 option.
// By default refresh time is set to 1 second. You can set this value to true
// or any integer value indicating number of seconds.
$config['upload_progress'] = false;

// Specifies for how many seconds the Undo button will be available
// after object delete action. Currently used with supporting address book sources.
// Setting it to 0, disables the feature.
$config['undo_timeout'] = 0;

// ----------------------------------
// USER PREFERENCES
// ----------------------------------

// Use this charset as fallback for message decoding
$config['default_charset'] = 'ISO-8859-1';

// skin name: folder from skins/
$config['skin'] = 'larry';

// show up to X items in messages list view
$config['mail_pagesize'] = 50;

// show up to X items in contacts list view
$config['addressbook_pagesize'] = 50;

// sort contacts by this col (preferably either one of name, firstname, surname)
$config['addressbook_sort_col'] = 'surname';

// the way how contact names are displayed in the list
// 0: display name
// 1: (prefix) firstname middlename surname (suffix)
// 2: (prefix) surname firstname middlename (suffix)
// 3: (prefix) surname, firstname middlename (suffix)
$config['addressbook_name_listing'] = 0;

// use this timezone to display date/time
// valid timezone identifers are listed here: php.net/manual/en/timezones.php
// 'auto' will use the browser's timezone settings
$config['timezone'] = 'auto';

// prefer displaying HTML messages
$config['prefer_html'] = true;

// display remote inline images
// 0 - Never, always ask
// 1 - Ask if sender is not in address book
// 2 - Always show inline images
$config['show_images'] = 0;

// open messages in new window
$config['message_extwin'] = false;

// open message compose form in new window
$config['compose_extwin'] = false;

// compose html formatted messages by default
// 0 - never, 1 - always, 2 - on reply to HTML message, 3 - on forward or reply to HTML message
$config['htmleditor'] = 0;

// show pretty dates as standard
$config['prettydate'] = true;

// save compose message every 300 seconds (5min)
$config['draft_autosave'] = 300;

// default setting if preview pane is enabled
$config['preview_pane'] = false;

// Mark as read when viewed in preview pane (delay in seconds)
// Set to -1 if messages in preview pane should not be marked as read
$config['preview_pane_mark_read'] = 0;

// Clear Trash on logout
$config['logout_purge'] = false;

// Compact INBOX on logout
$config['logout_expunge'] = false;

// Display attached images below the message body 
$config['inline_images'] = true;

// Encoding of long/non-ascii attachment names:
// 0 - Full RFC 2231 compatible
// 1 - RFC 2047 for 'name' and RFC 2231 for 'filename' parameter (Thunderbird's default)
// 2 - Full 2047 compatible
$config['mime_param_folding'] = 1;

// Set true if deleted messages should not be displayed
// This will make the application run slower
$config['skip_deleted'] = false;

// Set true to Mark deleted messages as read as well as deleted
// False means that a message's read status is not affected by marking it as deleted
$config['read_when_deleted'] = true;

// Set to true to never delete messages immediately
// Use 'Purge' to remove messages marked as deleted
$config['flag_for_deletion'] = false;

// Default interval for auto-refresh requests (in seconds)
// These are requests for system state updates e.g. checking for new messages, etc.
// Setting it to 0 disables the feature.
$config['refresh_interval'] = 60;

// If true all folders will be checked for recent messages
$config['check_all_folders'] = false;

// If true, after message delete/move, the next message will be displayed
$config['display_next'] = true;

// 0 - Do not expand threads 
// 1 - Expand all threads automatically 
// 2 - Expand only threads with unread messages 
$config['autoexpand_threads'] = 0;

// When replying:
// -1 - don't cite the original message
// 0  - place cursor below the original message
// 1  - place cursor above original message (top posting)
$config['reply_mode'] = 0;

// When replying strip original signature from message
$config['strip_existing_sig'] = true;

// Show signature:
// 0 - Never
// 1 - Always
// 2 - New messages only
// 3 - Forwards and Replies only
$config['show_sig'] = 1;

// Use MIME encoding (quoted-printable) for 8bit characters in message body
$config['force_7bit'] = false;

// Defaults of the search field configuration.
// The array can contain a per-folder list of header fields which should be considered when searching
// The entry with key '*' stands for all folders which do not have a specific list set.
// Please note that folder names should to be in sync with $config['default_folders']
$config['search_mods'] = null;  // Example: array('*' => array('subject'=>1, 'from'=>1), 'Sent' => array('subject'=>1, 'to'=>1));

// Defaults of the addressbook search field configuration.
$config['addressbook_search_mods'] = null;  // Example: array('name'=>1, 'firstname'=>1, 'surname'=>1, 'email'=>1, '*'=>1);

// 'Delete always'
// This setting reflects if mail should be always deleted
// when moving to Trash fails. This is necessary in some setups
// when user is over quota and Trash is included in the quota.
$config['delete_always'] = false;

// Directly delete messages in Junk instead of moving to Trash
$config['delete_junk'] = false;

// Behavior if a received message requests a message delivery notification (read receipt)
// 0 = ask the user, 1 = send automatically, 2 = ignore (never send or ask)
// 3 = send automatically if sender is in addressbook, otherwise ask the user
// 4 = send automatically if sender is in addressbook, otherwise ignore
$config['mdn_requests'] = 0;

// Return receipt checkbox default state
$config['mdn_default'] = 0;

// Delivery Status Notification checkbox default state
// Note: This can be used only if smtp_server is non-empty
$config['dsn_default'] = 0;

// Place replies in the folder of the message being replied to
$config['reply_same_folder'] = false;

// Sets default mode of Forward feature to "forward as attachment"
$config['forward_attachment'] = false;

// Defines address book (internal index) to which new contacts will be added
// By default it is the first writeable addressbook.
// Note: Use '0' for built-in address book.
$config['default_addressbook'] = null;

// Enables spell checking before sending a message.
$config['spellcheck_before_send'] = false;

// Skip alternative email addresses in autocompletion (show one address per contact)
$config['autocomplete_single'] = false;

// Default font for composed HTML message.
// Supported values: Andale Mono, Arial, Arial Black, Book Antiqua, Courier New,
// Georgia, Helvetica, Impact, Tahoma, Terminal, Times New Roman, Trebuchet MS, Verdana
$config['default_font'] = 'Verdana';

// ----------------------------------
// PLUGINS
// ----------------------------------

// List of active plugins (in plugins/ directory)

//Here we declare our activated plugins. If you want to add plugins, 
//please do the following db command in a root terminal
//config setprop roundcubemail PluginsList "plugin1,plugin2,plugin3"
//Then issue
//signal-event nethserver-roundcubemail-update

   $config['plugins'] = array(managesieve,markasjunk,contextmenu,cloudview,dragdropfile);


// end of config file