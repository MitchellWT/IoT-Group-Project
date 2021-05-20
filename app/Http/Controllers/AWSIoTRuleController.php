<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Laravel\AwsFacade;
use App\Models\AWSIoTRule;
use Aws\Iot\Exception\IotException;

class AWSIoTRuleController extends Controller
{
    /* Show all AWS IoT Rules.
     *
     */
    public function index()
    {
        $IoTClient = AwsFacade::createClient('iot');
        $AWSIoTRuleNames = AWSIoTRule::all();
        $ruleArr = [];

        foreach ($AWSIoTRuleNames as $AWSIoTRuleName) {
            $result = $IoTClient->getTopicRule([
                'ruleName' => $AWSIoTRuleName->rule_name
            ]);
            $result = ($result->toArray())['rule'];

            array_push($ruleArr, $result);
        }

        return view('AWSIoTRules.index', compact('ruleArr'));
    }

    /* Shows information into a
     * specific AWS IoT Rule.
     *
     */
    public function show(String $AWSIoTRule)
    {
        $IoTClient = AwsFacade::createClient('iot');
        $result = $IoTClient->getTopicRule([
            'ruleName' => $AWSIoTRule
        ]);
        $rule = ($result->toArray())['rule'];

        return view('AWSIoTRules.show', compact('rule'));
    }

    /* Returns a view for editing a
     * existing AWSIoTRule.
     */
    public function edit(String $AWSIoTRule)
    {
        $IoTClient = AwsFacade::createClient('iot');
        $result = $IoTClient->getTopicRule([
            'ruleName' => $AWSIoTRule
        ]);
        $rule = ($result->toArray())['rule'];

        return view('AWSIoTRules.edit', compact('rule'));
    }

    /* Updates the AWS IoT Core rule.
     * This is done using the AWS PHP SDK.
     */
    public function update(Request $request, String $AWSIoTRule)
    {
        $validatedRequest = $this->validateRuleSQL($request);

        $IoTClient = AwsFacade::createClient('iot');
        $result = $IoTClient->getTopicRule([
            'ruleName' => $AWSIoTRule
        ]);
        $resultArray = ($result->toArray());

        $result = $IoTClient->replaceTopicRule([
            'ruleName' => $resultArray['rule']['ruleName'],
            'topicRulePayload' => [
                'actions' => $resultArray['rule']['actions'],
                'awsIotSqlVersion' => $resultArray['rule']['awsIotSqlVersion'],
                'description' => $resultArray['rule']['description'],
                'ruleDisabled' => $resultArray['rule']['ruleDisabled'],
                'sql' => $validatedRequest['rule_sql'],
            ]
        ]);

        return redirect()->route('AWSIoTRules.index');
    }

    /* Returns a view for creating a
     * new AWSIoTRule.
     */
    public function create()
    {
        return view('AWSIoTRules.create');
    }

    /* Stores only the rule name in the database.
     * This data is then used with the AWS PHP SDK
     * to perform operations on AWS IoT Core.
     */
    public function store(Request $request)
    {
        $validatedRequest = $this->validateRuleName($request);

        AWSIoTRule::create($validatedRequest);

        return redirect()->route('AWSIoTRules.index');
    }

    /* Deletes a AWSIoTRule from the database.
     * This does not effect AWS IoT Core.
     */
    public function delete($AWSIoTRule)
    {
        $rule = AWSIoTRule::firstWhere('rule_name', $AWSIoTRule);

        AWSIotRule::destroy($rule->id);

        return redirect()->route('AWSIoTRules.index');
    }

    public function validateRuleName(Request $request)
    {
        return $request->validate([
            'rule_name' => 'required|string'
        ]);
    }

    public function validateRuleSQL(Request $request)
    {
        return $request->validate([
            'rule_sql' => 'required|string'
        ]);
    }
}
