import sys
from threp import THReplay
import csv
import codecs

if len(sys.argv)<2:
    print("参数过少")
else:
    file="rep/"+sys.argv[1]
    tr=THReplay(file)
    csvfile="csv/"+sys.argv[1][:-4]+".csv"
    with open(csvfile, "wb") as datacsv:
        datacsv.write(codecs.BOM_UTF8)
    with open(csvfile, 'a', encoding='utf-8', newline='') as csvfile:
        writer=csv.writer(csvfile)
        index=['']
        for i in range(60):
            index.append("第"+str(i)+"帧")
        writer.writerow(index)
        kba=tr.getKeyboardAction()
        for i in range(len(kba)):
            second=kba[i][:]
            second.insert(0, "第"+str(i)+"秒")
            writer.writerow(second)