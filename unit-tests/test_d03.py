#!/usr/bin/python

from helper import *

# for expanding the ~ in filenames; checking if a file exists
import os
from os.path import expanduser
from os.path import isfile
from os.path import isdir

day_location = "../d03/"

# START OF TESTS  START OF TESTS  START OF TESTS  START OF TESTS

if not isdir(expanduser("~/mamp/apps/j03")):
    print("Do you have mamp installed? The folder ~/mamp/apps/j03 doesn't exist.")
    print("mkdir ~/mamp/apps/j03")
    exit(1)

print("Copying git repo to the correct location...")
exitcode, out, err = run_command("rsync -rv --exclude=.git " + day_location + " " + expanduser("~/mamp/apps/j03/htdocs"))
if (len(err) > 0 and "identical" not in err):
    print("Failed to copy files!")
    print(err)
    exit(1)
run_command("mkdir " + expanduser("~/mamp/apps/j03/conf"))
run_command("cp " + day_location + "ex00/httpd-app.conf " + expanduser("~/mamp/apps/j03/conf"))
run_command("cp " + day_location + "ex00/httpd-vhosts.conf " + expanduser("~/mamp/apps/j03/conf"))
run_command("cp " + expanduser("~/mamp/apps/demo/conf/httpd-prefix.conf") + " " + expanduser("~/mamp/apps/j03/conf"))

print("")

print("Tests for ex00:")
print("NOTE: We could move the bitnami-apps-vhosts.conf file to the right place, but it's better to just check by hand...")
print("cat " + day_location + " ex00/bitnami-apps-vhosts.conf")
print("cat ~/mamp/apache2/conf/bitnami/bitnami-apps-vhosts.conf")

# ex01
print("\nTests for ex01:")
def test_ex01():
    exitcode, out, err = run_command("curl 'http://j03.local.42.fr:8080/ex01/phpinfo.php'")
    test_boolean("<!DOCTYPE html PUBLIC" in out, "is it an html?")
    test_boolean('name="ROBOTS"' in out, "does it contain ROBOTS?")
test_ex01()

# ex02
print("\nTests for ex02:")

test_command("curl 'http://j03.local.42.fr:8080/ex02/print_get.php?login=mmontinet'", """\
login: mmontinet
""", 0)

test_command("curl 'http://j03.local.42.fr:8080/ex02/print_get.php?gdb=pied2biche&barry=barreamine'", """\
gdb: pied2biche
barry: barreamine
""", 0)

test_command("curl 'http://j03.local.42.fr:8080/ex02/print_get.php?say_hello=Hello+World%21'", """\
say_hello: Hello World!
""", 0)

test_command("curl 'http://j03.local.42.fr:8080/ex02/print_get.php?say_hello=Hello+World%21&a=arctic&b=butt&c=cat&d=ding&e=elephant&f=fling&g=generous'", """\
say_hello: Hello World!
a: arctic
b: butt
c: cat
d: ding
e: elephant
f: fling
g: generous
""", 0)

# ex03
print("\nTests for ex03:")
test_command("curl -c cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=set&name=plat&value=choucroute'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=plat'", """\
choucroute
""", 0)
test_command("curl -c cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=del&name=plat'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=plat'", """\
""", 0)
# ex03 "Empty" Value Tests
test_command("curl -c cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=set&name=empty&value=_'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=empty'", """\
_
""", 0)
test_command("curl -c cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=set&name=empty&value=null'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=empty'", """\
null
""", 0)
test_command("curl -c cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=del&name=empty'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=empty'", """\
""", 0)
# ex03 Array Tests
test_command("curl -c cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=set&name=array\[one\]&value=first'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=array\[one\]'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=array'", """\
Array
""", 0)
test_command("curl -c cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=del&name=array'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=array'", """\
""", 0)
# ex03 Broken Tests
test_command("curl -c cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=set&name=NAME&value=VALUE'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?name=NAME'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=NAME&value=BAD'", """\
VALUE
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=NAME'", """\
VALUE
""", 0)
test_command("curl -c cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=del&name=NAME'", """\
""", 0)
test_command("curl -b cook.txt 'http://j03.local.42.fr:8080/ex03/cookie_crisp.php?action=get&name=NAME'", """\
""", 0)
try:
    os.remove("cook.txt")
except:
    print("Could not remove cook.txt for some reason or another")

# ex04
print("\nTests for ex04:")
test_command("curl 'http://j03.local.42.fr:8080/ex04/raw_text.php'", "<html><body>Hello</body></html>\n", 0)
def lynx_tests():
    # needs function because we're not sure if lynx is installed
    command = "lynx -dump 'http://j03.local.42.fr:8080/ex04/raw_text.php'"
    try:
        exitcode, out, err = run_command(command)
    except:
        print("NOTE: lynx is not installed, meaning we don't know if the Content-Type was set correctly...")
        print("brew install links")
        return
    test_command("lynx -dump 'http://j03.local.42.fr:8080/ex04/raw_text.php'", "<html><body>Hello</body></html>\n\n")
    test_command("lynx -source 'http://j03.local.42.fr:8080/ex04/raw_text.php'", "<html><body>Hello</body></html>\n")
lynx_tests()

# ex05
print("\nTests for ex05:")
def test_ex05():
    command = "curl --head http://j03.local.42.fr:8080/ex05/read_img.php"
    exitcode, out, err = run_command(command);
    test_boolean("Content-Type: image/png" in out, "content type test")
    command = "curl http://j03.local.42.fr:8080/ex05/read_img.php"
    exitcode, out, err = run_command(command);
    test_boolean(out == open(expanduser('~/mamp/apps/j03/htdocs/img/42.png'), 'r').read(), "image content test")

test_ex05()

print("\nTests for ex06:")
exitcode, out, err = run_command("curl -v --user root:root http://j03.local.42.fr:8080/ex06/members_only.php")
test_boolean("HTTP 1.0, assume close after body" in err, "assume close after body")
test_boolean("HTTP/1.0 401 Unauthorized" in err, "unauthorized")
test_boolean("WWW-Authenticate: Basic realm=''Espace membres''" in err, "why is it in french")
test_boolean("<html><body>Cette zone est accessible uniquement aux membres du site</body></html>" in out, "actual body part")
exitcode, out, err = run_command("curl --user zaz:jaimelespetitsponeys http://j03.local.42.fr:8080/ex06/members_only.php")
test_boolean("Bonjour Zaz<br />" in out, "hello zaz")
test_boolean("<img src='data:image/png;base64,iVBORw0KGgoAAAA" in out, "first image")
test_boolean("6MIHnr2t+eeO4Fr+v/H80AmcVvzqAfAAAAAElFTkSuQmCC'>" in out, "second image")

# END OF TESTS  END OF TESTS  END OF TESTS  END OF TESTS  END OF TESTS

print_final_results();
