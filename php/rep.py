import sys
from threp import THReplay
from math import floor

actions=['↑', '↓', '←', '→']

def is_one_frame(last, now, next):
    re=[]
    for action in actions:
        if action in now:
            if (action not in last) and (action not in next):
                re.append(action)
    return re

def is_level3(last, now, next):
    if last == '○' or next == '○':
        return False
    for action in actions:
        if ((action in last and action in now) or (action in now and action in next)):
            return False
    return True

def is_level2(last, now, next):
    if last == '○' and next == '○':
        return False
    for action in actions:
        if (action in last and action in now and action in next):
            return False
    return True

def second_to_minute(second):
    if second<60:
        return str(second)+"秒"
    else:
        return str(floor(second/60))+"分"+str(second%60)+"秒"

def delta(second1, frame1, second2, frame2):
    if frame1<frame2:
        return "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;距上一次" + str(second1 - second2 - 1) + "秒" + str(frame1 + 60 - frame2) + "帧"
    else:
        return "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;距上一次" + str(second1 - second2) + "秒" + str(frame1 - frame2) + "帧"

def simple_action_analyse(tr):
    re_level1=[]
    re_level2=[]
    re_level3=[]
    last_level1 = None
    last_level2 = None
    last_level3 = None
    kba=tr.getKeyboardAction()
    for i in range(len(kba)):
        kb_array=kba[i]
        for j in range(len(kb_array)):
            if (i==0 and j==0) or (i==len(kba)-1 and j==len(kb_array)-1):
                pass
            else:
                if j==0:
                    if len(kba[i-1])!=0:
                        last=kba[i-1][len(kba[i-1])-1]
                    else:
                        continue
                else:
                    last=kb_array[j-1]
                now=kb_array[j]
                if j==len(kb_array)-1:
                    if len(kba[i+1])!=0:
                        next=kba[i+1][0]
                    else:
                        continue
                else:
                    next=kb_array[j+1]
                for one_frame in is_one_frame(last, now, next):
                    info = second_to_minute(i) + str(j) + "帧:" + one_frame + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;前后三帧动作：" + last + " | " + now + " | " + next
                    if is_level3(last, now, next):
                        if last_level3!=None:
                            info+=delta(i, j, last_level3[0], last_level3[1])
                        last_level3=[i, j]
                        re_level3.append(info)
                    elif is_level2(last, now, next):
                        if last_level2!=None:
                            info+=delta(i, j, last_level2[0], last_level2[1])
                        last_level2=[i, j]
                        re_level2.append(info)
                    else:
                        if last_level1!=None:
                            info+=delta(i, j, last_level1[0], last_level1[1])
                        last_level1=[i, j]
                        re_level1.append(info)

    return re_level1, re_level2, re_level3

if len(sys.argv)<2:
    print("参数过少")
else:
    file="rep/"+sys.argv[1]
    tr=THReplay(file)
    print(tr.getBaseInfo())
    score_str=""
    for s in tr.getStageScore():
        score_str+=str(s)+"&nbsp;&nbsp;&nbsp;"
    print("各面分数："+score_str)
    print("机签："+tr.getPlayer())
    print("处理落："+str(tr.getSlowRate())+"%")
    print("日期："+str(tr.getDate()))
    error=tr.getError()
    print(len(error))
    for msg in error:
        print(msg)
    level1, level2, level3=simple_action_analyse(tr)
    print(len(level1))
    for l in level1:
        print(l)
    print(len(level2))
    for l in level2:
        print(l)
    print(len(level3))
    for l in level3:
        print(l)