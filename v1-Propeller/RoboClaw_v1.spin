{{
***INFORMATION*****************************************************************************
*                   RoboClaw Internet-Controlled Mechanical Arm Source Code               *
*  File:        RoboClaw_v1.spin                                                          *
*  Version:     Version 1.0                                                               *
*  Created by:  Jeremy Evan Blum 2009                                                     *
*  Website:     http://www.jeremyblum.com                                                 *
*                                                                                         *
*  COPYRIGHT 2009 JEREMY BLUM.  ALL RIGHTS RESERVED.                                      *
*******************************************************************************************
}}

CON

{FREQUENCY SETTINGS}
  _clkmode        = xtal1+pll16x                            '16x multiplier
  _xinfreq        = 5_000_000                               '5 mhz Crystal Speed
  
{NETBURNER SERIAL INPUT PIN}
  netTXinput      =16                                      'Input PIN from NetBurner (TX)

{NETBURNER SERIAL OUTPUT PIN}  
  netRXoutput     =17                                      'Output PIN to NetBurner (RX)

{RELAY OUTPUT PINS}
  ClawClose       =0                                       'Output PIN to Close Claw
  ClawOpen        =8                                       'Output PIN to Open Claw 
  WristUp         =1                                       'Output PIN to Tilt Wrist Up
  WristDown       =9                                       'Output PIN to Tilt Wrist Down
  ElbowUp         =2                                       'Output PIN to Bend Elbow Up
  ElbowDown       =10                                      'Output PIN to Bend Elbow Down
  ArmUp           =3                                       'Output PIN to Swing Arm Up
  ArmDown         =11                                      'Output PIN to Swing Arm Down
  SwivelLeft      =4                                       'Output PIN to Swivel Arm to Left (Counterclockwise)
  SwivelRight     =12                                      'Output PIN to Swivel Arm to Right (Clockwise) 

{LED DEBUG OUTPUT PINS}                                    
  ConnectFail     =15                                      'Output PIN for PINK connect fail                    
  ConnectPass     =14                                      'Output PIN for PINK connect pass

{MAGNITUDES}
  small           =10000                                   'small amount of movement
  medium          =20000                                   'medium amount of movement
  large           =30000                                   'large amount of movement
  
{PIN MODE}
  IOpins          =%00000000000000101101111100011111       'Sets the direction for each of the IO Pins (1=out, 0=in)                          

OBJ
  myPink:  "PinkV2"                                        'Object for PINK Control  
VAR
   long stack1 [64]                                        'Stack for Cog 1
   byte buf    [64]                                        'buffer size equals maximum Pink variable size, holds asciiz string
PUB main  

  DIRA:=IOpins                                             'Properly sets Directions for each IO pin                                                     

  cognew(command, @stack1)                      
PUB connect
  
  DIRA:=IOpins
     

  'checks to ensure that prop is connected to PINK
    myPink.getStatus
    if myPink.noResponse
      OUTA[ConnectPass]~
      OUTA[ConnectFail]~~
    else
      if myPink.isConnected 
        OUTA[ConnectPass]~~
        OUTA[ConnectFail]~

PUB command | mag, action


DIRA:=IOpins                                             'Properly sets Directions for each IO pin 

myPink.PinkV2("0",netRXoutput,netTXinput)                'initializes the PINK device   
 
repeat

  connect

  {What is the requested magnitdue?}

  myPink.readVar(myPink#Nb_var21, @buf)
    if buf[0] == "3"
      mag := large
    elseif buf[0] == "2"
      mag := medium
    else
      mag := small
        
  {What action has been requested?}
  myPink.readVar(myPink#Nb_var20, @buf)
    
    if buf[0] == "C" AND buf[1] == "C"
      action := ClawClose
    elseif buf[0] == "C" AND buf[1] == "O"
      action := ClawOpen
    elseif buf[0] == "W" AND buf[1] == "U"
      action := WristUp
    elseif buf[0] == "W" AND buf[1] == "D"
      action := WristDown
    elseif buf[0] == "E" AND buf[1] == "U"
      action := ElbowUp
    elseif buf[0] == "E" AND buf[1] == "D"
      action := ElbowDown
    elseif buf[0] == "A" AND buf[1] == "U"
      action := ArmUp
    elseif buf[0] == "A" AND buf[1] == "D"
      action := ArmDown
    elseif buf[0] == "S" AND buf[1] == "L"
      action := SwivelLeft
    elseif buf[0] == "S" AND buf[1] == "R"
      action := SwivelRight                                        
    else
      action := 1234
 
  {Do the Action}
  ifnot action == 1234      
    movement(action, mag)

PUB movement(action_pin, magnitude) | x

  DIRA:=IOpins                                             'Properly sets Directions for each IO pin

  x:=0
  repeat
    OUTA[action_pin]~~
    x++
  until x==magnitude
 
  {RESET THE VARIABLES}
  OUTA[action_pin]~
  myPink.writeVar(myPink#Nb_var20,string("0"))